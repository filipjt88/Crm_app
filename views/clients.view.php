<?php

session_start();
require_once '../core/db.php';

if(!isset($_SESSION('user_id'))) {
    header('Location: ../controller/login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM clients WHERE user_id = ?");
$stmt->execute([$user_id]);
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>