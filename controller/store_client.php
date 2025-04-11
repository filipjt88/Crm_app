<?php
session_start();
require_once 'core/connection.php'; 

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone'] ?? '');
$company = trim($_POST['company'] ?? '');

// Validacija (osnovna)
$errors = [];

if (empty($name)) $errors[] = "Ime je obavezno.";
if (empty($email)) $errors[] = "Email je obavezan.";
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Neispravan email.";

if (count($errors) > 0) {
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
    echo "<p><a href='add_client.php'>Nazad</a></p>";
    exit;
}

// Ubacivanje u bazu
$stmt = $pdo->prepare("INSERT INTO clients (user_id, name, email, phone, company) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$user_id, $name, $email, $phone, $company]);

header('Location: clients.php');
exit;
