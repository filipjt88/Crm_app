<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../controller/login.php');
    exit;
}

require '../parts/top.php';

if (!isset($_GET['user_id'])) {
    die('Client ID is missing.');
}

$user_id = $_GET['user_id'];

// Priprema za izvršavanje DELETE upita
try {
    $stmt = $pdo->prepare("DELETE FROM clients WHERE id = :id");
    $stmt->execute(['id' => $user_id]);

    // Redirekcija nazad na listu klijenata
    header("Location: clients_list.php?msg=deleted");
    exit;
} catch (PDOException $e) {
    echo "Error deleting client: " . $e->getMessage();
}



require '../parts/bottom.php';