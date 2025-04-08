<?php
$title = "Home page";
include '../parts/top.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.view.php");
    exit();
}
?>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-6 offset-3 mt-5">
                <sectio class="user">
                <h1>Dobrodošao, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
        <span>Uloga: <?php echo htmlspecialchars($_SESSION['user_role']); ?></span>
        <a href="../controller/logout.php" class="btn btn-danger">Odjava</a>
                </sectio>
            </div>
        </div>
    </div>


<?php include '../parts/bottom.php'; ?>
