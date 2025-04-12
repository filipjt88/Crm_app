<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../controller/login.php');
    exit;
}

require '../parts/top.php';




require '../parts/bottom.php';