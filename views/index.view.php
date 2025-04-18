<?php
$title = "Home";
include '../parts/top.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.view.php");
    exit();
}
?>

<?php include '../parts/navbar.php'; ?>





<?php include '../parts/bottom.php'; ?>