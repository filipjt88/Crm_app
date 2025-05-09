<?php
$title = 'Edit';
session_start();
require_once '../core/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$client_id = $_GET['id'] ?? null;

if (!$client_id) {
    header('Location: ../controller/store_client.php');
    exit;
}

// Provera da li klijent pripada ulogovanom korisniku
$stmt = $pdo->prepare("SELECT * FROM clients WHERE id = ? AND user_id = ?");
$stmt->execute([$client_id, $user_id]);
$client = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$client) {
    echo "Klijent nije pronađen.";
    exit;
}
?>


    <?php include '../parts/top.php'; ?>
    <?php include '../parts/navbar.php'; ?>
    <div class="container">
        <h2>Izmeni klijenta</h2>
        <!-- Forma edit klijent -->
        <form action="../controller/edit_client.php" method="POST">
            <input type="hidden" name="id" value="<?= $client['id'] ?>">

            <div class="mb-3">
                <label class="form-label">Ime i prezime</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($client['name']) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email *</label>
                <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($client['email']) ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Telefon</label>
                <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($client['phone']) ?>">
            </div>

            <div class="mb-3">
                <label class="form-label">Kompanija</label>
                <input type="text" name="company" class="form-control" value="<?= htmlspecialchars($client['company']) ?>">
            </div>

            <button type="submit" class="btn btn-primary">Sačuvaj izmene</button>
            <a href="../views/index.view.php" class="btn btn-secondary">Nazad</a>
        </form>
        <!-- Kraj forme edit klijent -->

    </div>

    <?php include '../parts/bottom.php'; ?>