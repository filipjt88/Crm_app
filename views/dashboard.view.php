<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="container text-center">
        <h1>Dobrodošao, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
        <p>Uloga: <?php echo htmlspecialchars($_SESSION['user_role']); ?></p>
        <a href="logout.php" class="btn btn-danger">Odjava</a>
    </div>
</body>
</html>