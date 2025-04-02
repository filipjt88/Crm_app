<?php
require 'core/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashiranje lozinke
    $role = $_POST['role'];

    // Provera da li email već postoji
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->rowCount() > 0) {
        die("Email je već registrovan.");
    }

    // Ubacivanje korisnika u bazu
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$name, $email, $password, $role])) {
        echo "Uspešno registrovan! <a href='../views/login.php'>Prijavi se</a>";
    } else {
        echo "Došlo je do greške.";
    }
}
?>


