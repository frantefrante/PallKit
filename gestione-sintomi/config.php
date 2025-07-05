<?php
// config.php
// Imposta qui i parametri di connessione al database MySQL

define('DB_HOST',     '127.0.0.1');       // o 'localhost'
define('DB_NAME',     'medboxit_db');    // il nome del database che hai creato
define('DB_USER',     'medboxit_user');  // l’utente che hai creato
define('DB_PASSWORD', 'StrongP@ssw0rd'); // la password scelta

/**
 * Ritorna un’istanza PDO con la connessione al database.
 */
function getPDO(): PDO {
    $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8mb4';
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    return $pdo;
}