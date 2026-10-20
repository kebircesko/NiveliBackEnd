<?php
// Ndryshoni keto vlera nese MySQL juaj perdor kredenciale te tjera.
const DB_HOST = 'localhost';
// Kredencialet jane te njejta me shembujt e ligjeratave 17, 20 dhe 21.
const DB_USER = 'kebir';
const DB_PASS = 'Kebir123!';
const DB_NAME = 'nexa_store';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    $db->set_charset('utf8mb4');
} catch (mysqli_sql_exception $exception) {
    http_response_code(500);
    exit('<h2>Lidhja me databazen deshtoi</h2><p>Importo <strong>database/nexa_store.sql</strong> ne phpMyAdmin dhe kontrollo kredencialet ne <strong>config/database.php</strong>.</p>');
}
