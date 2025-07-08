<?php
// process-necpal.php
require_once __DIR__ . '/config.php';

// Accetta solo POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

// Sanificazione
function sanitize(string $str): string {
    return trim(htmlspecialchars($str, ENT_QUOTES, 'UTF-8'));
}

// Legge i campi
$date1    = $_POST['date_1']    ?? '';
$text1    = $_POST['text_1']    ?? '';
$date2    = $_POST['date_2']    ?? '';
$radio1   = $_POST['radio_1']   ?? '';
$cb1      = isset($_POST['checkbox_1']) ? 1 : 0;
$cb2      = isset($_POST['checkbox_2']) ? 1 : 0;
$cb3_list = $_POST['checkbox_3'] ?? [];
$cb4_list = $_POST['checkbox_4'] ?? [];

// Validazione minima
$errors = [];
if (!$date1)  $errors[] = 'Data compilazione mancante';
if (!$text1)  $errors[] = 'Nome e cognome mancante';
if (!$date2)  $errors[] = 'Data di nascita mancante';
if (!in_array($radio1, ['one','two'], true)) {
    $errors[] = 'Risposta sorprendere non valida';
}

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

// Prepara JSON
$indicatori_clinici   = json_encode(array_map('sanitize', $cb3_list), JSON_UNESCAPED_UNICODE);
$indicatori_specifici = json_encode(array_map('sanitize', $cb4_list), JSON_UNESCAPED_UNICODE);

try {
    $pdo = getPDO();
    $stmt = $pdo->prepare(<<<SQL
        INSERT INTO necpal_submissions
        (date_compilazione, nome_paziente, data_nascita, surprise_question,
         richieste_palliativo, bisogni_identificati, indicatori_clinici,
         indicatori_specifici)
        VALUES
        (:date1, :text1, :date2, :radio1, :cb1, :cb2, :clinici, :specifici)
    SQL);

    $stmt->execute([
        ':date1'     => $date1,
        ':text1'     => $text1,
        ':date2'     => $date2,
        ':radio1'    => $radio1,
        ':cb1'       => $cb1,
        ':cb2'       => $cb2,
        ':clinici'   => $indicatori_clinici,
        ':specifici' => $indicatori_specifici,
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