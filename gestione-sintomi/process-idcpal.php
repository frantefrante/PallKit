<?php
// process-idcpal.php
require_once __DIR__ . '/config.php';

function ensureTable(PDO $pdo): void {
    $sql = <<<SQL
    CREATE TABLE IF NOT EXISTS idcpal_submissions (
      id INT AUTO_INCREMENT PRIMARY KEY,
      date_compilazione DATE NOT NULL,
      nome_paziente VARCHAR(255) NOT NULL,
      data_nascita DATE NOT NULL,
      voci TEXT,
      esito VARCHAR(50) NOT NULL,
      submitted_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
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

$date1 = $_POST['date_1'] ?? '';
$nome  = $_POST['text_1'] ?? '';
$dob   = $_POST['date_2'] ?? '';
$voci  = $_POST['voci'] ?? [];
$esito = $_POST['idcpal-esito'] ?? '';

$errors = [];
if (!$date1) $errors[] = 'Data compilazione mancante';
if (!$nome)  $errors[] = 'Nome e cognome mancante';
if (!$dob)   $errors[] = 'Data di nascita mancante';
if (!$esito) $errors[] = 'Classificazione mancante';

$isAjax = isset($_POST['ajax']) ||
    (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');

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

$voci_json = json_encode(array_map('sanitize', $voci), JSON_UNESCAPED_UNICODE);

try {
    $pdo = getPDO();
    ensureTable($pdo);
    $stmt = $pdo->prepare(<<<SQL
        INSERT INTO idcpal_submissions
        (date_compilazione, nome_paziente, data_nascita, voci, esito)
        VALUES
        (:d, :n, :dob, :v, :e)
    SQL);
    $stmt->execute([
        ':d' => $date1,
        ':n' => $nome,
        ':dob'=> $dob,
        ':v' => $voci_json,
        ':e' => $esito,
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
