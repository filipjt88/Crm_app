<?php
session_start();
require '../core/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Pronalazak da li korisnik postoji u bazi podataka po email adresi
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Postavljanje sesije
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];

        // Redirekcija na pocetnu stranicu
        header("Location:../views/index.view.php");
        exit();
    } else {
        echo "Neispravni podaci. <a href='../views/login.view.php'>Pokušajte ponovo</a>";
    }
}
?>
