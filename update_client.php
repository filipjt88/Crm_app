<?php
require 'core/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'] ?? null;
    $first_name = $_POST['first_name'] ?? "";
    $last_name = $_POST['last_name'] ?? "";
    $email = $_POST['email'] ?? "";
    $phone = $_POST['phone'] ?? "";

    if (!$id || !$first_name || !$last_name || !$email || !$phone) {
        die("Sva polja su obavezna.");
    }

    $sql = "UPDATE clients SET first_name = :first_name, last_name = :last_name, email = :email, phone = :phone WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'phone' => $phone
    ]);

    header("Location: index.html");
    exit();
}
?>
