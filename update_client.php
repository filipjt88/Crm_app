<?php
require 'core/db.php';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['notes'])) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $email      = $_POST['email'];
    $phone      = $_POST['phone'];
    $notes      = $_POST['notes'];

    $stmt = $pdo->prepare("SELECT id FROM clients WHERE id = ?");
    $stmt->execute([$id]);
    if(!$stmt->fetch()) {
        echo json_encode(["error" => "Client not exist!"]);
        exit;
    }

    $stmt = $pdo->prepare("UPDATE clients SET first_name = ?, last_name = ?, email = ?, phone = ?, notes = ? WHERE id = ?");
    $success = $stmt->execute([$first_name, $last_name, $email, $phone, $notes]);

    if($success) {
        echo json_encode(["success" => "Client details successfully updated!"]);
    } else {
        echo json_encode(["error" => "update error occurred!"]);
    }

}