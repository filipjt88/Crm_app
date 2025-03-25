<?php
$host = 'localhost';
$dbname = 'mini_crm';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysqli:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Niste povezani sa bazom podataka!" . $e->getMessage());
}