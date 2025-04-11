<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../controller/login.php');
    exit;
}
?>

<?php include '../parts/top.php'; ?>

<div class="container mt-5">
        <h2 class="text-center">Dodaj novog klijenta</h2>
        <div class="row">
            <div class="col-md-6 offset-3">
            <form action="store_client.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Ime i prezime *</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email *</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Telefon</label>
                <input type="text" name="phone" id="phone" class="form-control">
            </div>

            <div class="mb-3">
                <label for="company" class="form-label">Kompanija</label>
                <input type="text" name="company" id="company" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">Sačuvaj</button>
            <a href="clients.php" class="btn btn-secondary">Nazad</a>
        </form>
            </div>
        </div>
    </div>

<?php include '../parts/bottom.php'; ?>


