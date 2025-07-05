<?php
// create_table.php
require_once __DIR__ . '/config.php';

$sql = <<<SQL
CREATE TABLE IF NOT EXISTS necpal_submissions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  date_compilazione DATE NOT NULL,
  nome_paziente VARCHAR(255) NOT NULL,
  data_nascita DATE NOT NULL,
  surprise_question ENUM('one','two') NOT NULL,
  richieste_palliativo TINYINT(1) DEFAULT 0,
  bisogni_identificati TINYINT(1) DEFAULT 0,
  indicatori_clinici TEXT,
  indicatori_specifici TEXT,
  submitted_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
SQL;

try {
    $pdo = getPDO();
    $pdo->exec($sql);
    echo "<p style='color:green;'>Tabella <strong>necpal_submissions</strong> creata (o già esistente).</p>";
} catch (PDOException $e) {
    echo "<p style='color:red;'>Errore creazione tabella: " 
         . htmlspecialchars($e->getMessage()) . "</p>";
}