<?php
// process-necpal4.php
require_once __DIR__ . '/config.php';

/**
 * Crea la tabella per i dati NECPAL4 se non esiste.
 */
function ensureTable(PDO $pdo): void {
    $sql = <<<SQL
    CREATE TABLE IF NOT EXISTS necpal4_submissions (
      id INT AUTO_INCREMENT PRIMARY KEY,
      date_compilazione DATE NOT NULL,
      nome_paziente VARCHAR(255) NOT NULL,
      data_nascita DATE NOT NULL,
      surprise_question ENUM('yes','no') NOT NULL,
      bisogni_pall TINYINT(1) DEFAULT 0,
      perdita_funz TINYINT(1) DEFAULT 0,
      perdita_nutr TINYINT(1) DEFAULT 0,
      multimorbidita TINYINT(1) DEFAULT 0,
      uso_risorse TINYINT(1) DEFAULT 0,
      patologie TEXT,
      submitted_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    SQL;
    $pdo->exec($sql);
}

// Accetta solo POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

function sanitize(string $str): string {
    return trim(htmlspecialchars($str, ENT_QUOTES, 'UTF-8'));
}

$date1   = $_POST['date_1']   ?? '';
$text1   = $_POST['text_1']   ?? '';
$date2   = $_POST['date_2']   ?? '';
$sq      = $_POST['sq']       ?? '';
$bisogni = isset($_POST['bisogni_pall']) ? 1 : 0;
$funz    = isset($_POST['perdita_funz']) ? 1 : 0;
$nutr    = isset($_POST['perdita_nutr']) ? 1 : 0;
$multi   = isset($_POST['multimorbidita']) ? 1 : 0;
$risorse = isset($_POST['uso_risorse']) ? 1 : 0;
$pat     = $_POST['patologie'] ?? [];

$errors = [];
if (!$date1) $errors[] = 'Data compilazione mancante';
if (!$text1) $errors[] = 'Nome e cognome mancante';
if (!$date2) $errors[] = 'Data di nascita mancante';
if (!in_array($sq, ['yes','no'], true)) $errors[] = 'Risposta SQ non valida';

$isAjax = isset($_POST['ajax']) ||
    (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest');

if ($errors) {
    if ($isAjax) {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'errors' => $errors]);
    } else {
        echo "<h3>Errore:</h3><ul>";
        foreach ($errors as $e) {
            echo "<li>" . sanitize($e) . "</li>";
        }
        echo "</ul><p><a href=\"index.php\">Torna indietro</a></p>";
    }
    exit;
}

$patologie_json = json_encode(array_map('sanitize', $pat), JSON_UNESCAPED_UNICODE);

try {
    $pdo = getPDO();
    ensureTable($pdo);
    $stmt = $pdo->prepare(<<<SQL
        INSERT INTO necpal4_submissions
        (date_compilazione, nome_paziente, data_nascita, surprise_question,
         bisogni_pall, perdita_funz, perdita_nutr, multimorbidita, uso_risorse, patologie)
        VALUES
        (:date1, :text1, :date2, :sq, :b, :f, :n, :m, :u, :pat)
    SQL);

    $stmt->execute([
        ':date1' => $date1,
        ':text1' => $text1,
        ':date2' => $date2,
        ':sq'    => $sq,
        ':b'     => $bisogni,
        ':f'     => $funz,
        ':n'     => $nutr,
        ':m'     => $multi,
        ':u'     => $risorse,
        ':pat'   => $patologie_json,
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
        echo "<h3>Errore server:</h3><p>" . sanitize($ex->getMessage()) . "</p>";
    }
    exit;
}
