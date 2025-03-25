<?php

require './core/db.php';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $stmt = $pdo->prepare("SELECT id FROM clients WHERE id = ?");
    $stmt->execute([$id]);
    if(!$stmt->fetch()) {
        echo json_encode(["error" => "Klijent ne postoji!"]);
        exit;
    }

    $stmt = $pdo->prepare("DELETE FROM clients WHERE id = ?");
    $success = $stmt->execute([$id]);
    if($success) {
        echo json_encode(["success" => "Klijent je uspesno obrisan iz baze!"]);
    } else {
        echo json_encode(["error" => "Doslo je do greske, klijent nije obrisan!"]);
    }
}