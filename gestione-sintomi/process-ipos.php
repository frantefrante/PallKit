<?php
// process-ipos.php
require_once __DIR__ . '/config.php';

function ensureTable(PDO $pdo): void {
    $sql = <<<SQL
    CREATE TABLE IF NOT EXISTS ipos_submissions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome_paziente VARCHAR(255) NOT NULL,
        id_paziente VARCHAR(100) NOT NULL,
        data_nascita DATE NOT NULL,
        data_compilazione DATE NOT NULL,
        compilatore ENUM('paziente','staff') NOT NULL,
        intervallo ENUM('3','7') NOT NULL,
        q1 TEXT,
        q2 TEXT,
        q3 INT,
        q4 INT,
        q5 INT,
        q6 INT,
        q7 INT,
        q8 INT,
        q9 INT,
        q10 VARCHAR(20),
        punteggio_totale INT,
        created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    SQL;
    $pdo->exec($sql);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

function sanitize(string $str): string {
    return trim(htmlspecialchars($str, ENT_QUOTES, 'UTF-8'));
}

$nome     = $_POST['nome'] ?? '';
$idpaz    = $_POST['id_paziente'] ?? '';
$nascita  = $_POST['data_nascita'] ?? '';
$data     = $_POST['data_compilazione'] ?? '';
$compil   = $_POST['compilatore'] ?? '';
$interv   = $_POST['intervallo'] ?? '';
$q1       = $_POST['q1'] ?? '';
$q2       = $_POST['q2'] ?? '';
$q3       = $_POST['q3'] ?? '';
$q4       = $_POST['q4'] ?? '';
$q5       = $_POST['q5'] ?? '';
$q6       = $_POST['q6'] ?? '';
$q7       = $_POST['q7'] ?? '';
$q8       = $_POST['q8'] ?? '';
$q9       = $_POST['q9'] ?? '';
$q10      = $_POST['q10'] ?? null;

$errors = [];
if (!$nome)     $errors[] = 'Nome paziente mancante';
if (!$idpaz)    $errors[] = 'ID paziente mancante';
if (!$nascita)  $errors[] = 'Data nascita mancante';
if (!$data)     $errors[] = 'Data compilazione mancante';
if (!in_array($compil, ['paziente','staff'], true)) $errors[] = 'Compilatore non valido';
if (!in_array($interv, ['3','7'], true)) $errors[] = 'Intervallo non valido';

$isAjax = isset($_POST['ajax']) || (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');

if ($errors) {
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'errors' => $errors]);
    } else {
        echo "<h3>Errore:</h3><ul>";
        foreach ($errors as $e) echo '<li>'.sanitize($e).'</li>';
        echo "</ul><p><a href='index.php'>Torna indietro</a></p>";
    }
    exit;
}

$nums = [$q3,$q4,$q5,$q6,$q7,$q8,$q9];
$punteggio = 0;
foreach ($nums as $n) {
    $val = is_numeric($n) ? (int)$n : 0;
    if ($val >=0 && $val <=4) $punteggio += $val;
}

try {
    $pdo = getPDO();
    ensureTable($pdo);
    $stmt = $pdo->prepare(<<<SQL
        INSERT INTO ipos_submissions
        (nome_paziente,id_paziente,data_nascita,data_compilazione,compilatore,intervallo,q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,punteggio_totale)
        VALUES
        (:nome,:idp,:nasc,:data,:comp,:intv,:q1,:q2,:q3,:q4,:q5,:q6,:q7,:q8,:q9,:q10,:tot)
    SQL);
    $stmt->execute([
        ':nome' => $nome,
        ':idp'  => $idpaz,
        ':nasc' => $nascita,
        ':data' => $data,
        ':comp' => $compil,
        ':intv' => $interv,
        ':q1'   => $q1,
        ':q2'   => is_array($q2) ? json_encode($q2, JSON_UNESCAPED_UNICODE) : $q2,
        ':q3'   => $q3,
        ':q4'   => $q4,
        ':q5'   => $q5,
        ':q6'   => $q6,
        ':q7'   => $q7,
        ':q8'   => $q8,
        ':q9'   => $q9,
        ':q10'  => $q10,
        ':tot'  => $punteggio,
    ]);
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
    } else {
        header('Location: grazie.php');
    }
    exit;
} catch (PDOException $ex) {
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => $ex->getMessage()]);
    } else {
        echo '<h3>Errore server:</h3><p>'.sanitize($ex->getMessage()).'</p>';
    }
    exit;
}
