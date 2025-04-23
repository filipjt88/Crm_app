<?php
require_once '../core/db.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../controller/login.php');
    exit;
}

require '../parts/top.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Client ID is missing or invalid.');
}

$user_id = $_GET['id'];

try {
    // Brisanje klijenta po ID-u
    $stmt = $pdo->prepare("DELETE FROM clients WHERE id = :id");
    $stmt->execute(['id' => $user_id]);

    // Redirekcija na stranicu nakon uspešnog brisanja
    header("Location: store_client.php?msg=deleted");
    exit;
} catch (PDOException $e) {
    echo "Error deleting client: " . $e->getMessage();
}


require '../parts/bottom.php';