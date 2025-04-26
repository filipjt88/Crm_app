<?php
require_once '../core/db.php';
session_start();
// Korisnik mora biti logovan
if (!isset($_SESSION['user_id'])) {
    header('Location: ../controller/login.php');
    exit;
}


if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('ID klijenta nedostaje ili je vise nevažeći.');
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
    echo "Greška pri brisanju klijenta: " . $e->getMessage();
}


require '../parts/bottom.php';