<?php
require './core/db.php';
header('Content-Type: application/json');



try {
    $stmt = $conn->query("SELECT * FROM clients");
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($clients);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Greška u bazi: ' . $e->getMessage()]);
}