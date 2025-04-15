<?php
session_start();
require_once 'core/connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$client_id = $_GET['id'] ?? null;

if (!$client_id) {
    header('Location: clients.php');
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

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Izmeni Klijenta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h2>Izmeni klijenta</h2>
        <form action="update_client.php" method="POST">
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
            <a href="clients.php" class="btn btn-secondary">Nazad</a>
        </form>
    </div>
</body>
</html>
