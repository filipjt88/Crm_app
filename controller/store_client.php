<?php
require_once '../core/db.php'; 
session_start();


if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone'] ?? '');
$company = trim($_POST['company'] ?? '');

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

$stmt = $pdo->prepare("INSERT INTO clients (user_id, name, email, phone, company) VALUES (?, ?, ?, ?, ?)");
$stmt->execute([$user_id, $name, $email, $phone, $company]);

header('Location: ../views/clients.view.php');
exit;
