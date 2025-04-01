<?php
require './core/db.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name =  $_POST['first_name'] ?? '';
    $last_name  = $_POST['last_name'] ?? '';
    $email      = $_POST['email'] ?? '';
    $phone      = $_POST['phone'] ?? '';
    $notes      = $_POST['notes'] ?? '';

    if(empty($first_name) || empty($last_name) || empty($email) || empty($phone)) {
        echo json_encode(["error" => "Sva polja su obavezna!"]);
        exit;
    }
    $stmt = $pdo->prepare("SELECT id FROM clients WHERE email = ?");
    $stmt->execute([$email]);

    if($stmt->fetch()) {
        echo json_encode(["error" => "Email vec postoji u bazi!"]);
        exit;
    }
    $stmt = $pdo->prepare("INSERT INTO clients (first_name, last_name, email, phone, notes) VALUES (?, ?, ?, ?, ?)");
    $success = $stmt->execute([$first_name, $last_name, $email, $phone ,$notes]);

    if($success) {
        echo json_encode(["success" => "Klijent je uspesno dodat u bazu!"]);
    } else {
        echo json_encode(["error" => "Klijent nije dodat u bazu!"]);
    }

} 