<?php
$title = "Home page";
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.view.php");
    exit();
}
?>
    <div class="container d-flex align-items-center justify-content-center vh-100 text-center">
        <h1>Dobrodošao, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
        <p>Uloga: <?php echo htmlspecialchars($_SESSION['user_role']); ?></p>
        
        <a href="../controller/logout.php" class="btn btn-danger">Odjava</a>
    </div>