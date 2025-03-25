<?php

require './core/db.php';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $stmt = $pdo->prepare("SELECT id FROM clients WHERE id = ?");
    $stmt->execute([$id]);
    if(!$stmt->fetch()) {
        echo json_encode(["error" => "Client does not exist!"]);
        exit;
    }

    $stmt = $pdo->prepare("DELETE FROM clients WHERE id = ?");
    $success = $stmt->execute([$id]);
    if($success) {
        echo json_encode(["success" => "Client has been successfully deleted from the database!"]);
    } else {
        echo json_encode(["error" => "Error occurred, the client was not deleted!"]);
    }
}