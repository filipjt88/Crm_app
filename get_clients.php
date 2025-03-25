<?php
require './core/db.php';

$stmt = $pdo->prepare("SELECT * FROM clients ORDER BY created_at DESC");
$stmt->execute();
$clients = $stmt->fetchAll();
echo json_encode($clients);