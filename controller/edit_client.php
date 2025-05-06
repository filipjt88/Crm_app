<?php

require_once '../core/db.php';
session_start();


// Korisnik mora biti logovan
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

//id korisnika
$user_id = $_SESSION['user_id'];

$id = $_POST['id'] ?? null;
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone'] ?? '');
$company = trim($_POST['company'] ?? '');

if (!$id || empty($name) || empty($email)) {
    echo "Greška: Sva obavezna polja moraju biti popunjena.";
    exit;
}

// Provera u bazi podataka da li klijent pripada korisniku
$check = $pdo->prepare("SELECT * FROM clients WHERE id = ? AND user_id = ?");
$check->execute([$id, $user_id]);
$existing = $check->fetch();

if (!$existing) {
    echo "Klijent nije pronađen ili nije tvoj.";
    exit;
}

// Ažuriranje u bazi podataka
$stmt = $pdo->prepare("UPDATE clients SET name = ?, email = ?, phone = ?, company = ? WHERE id = ? AND user_id = ?");
$stmt->execute([$name, $email, $phone, $company, $id, $user_id]);

header("Location: store_client.php");
exit;

?>
