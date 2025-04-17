<?php
session_start(); 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


require_once '../core/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../controller/login.php');
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM clients WHERE user_id = ?");
$stmt->execute([$user_id]);
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require '../parts/top.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-3">
                <h2 class="text-center">Lista klijenata</h2>
                <a href="../controller/add_client.php" class="btn btn-primary mb-3">Dodaj klijenta</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ime</th>
                            <th>Email</th>
                            <th>Telefon</th>
                            <th>Kompanija</th>
                            <th colspan="2">Akcija</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($clients as $client): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($client['name']); ?></td>
                                <td><?php echo htmlspecialchars($client['email']); ?></td>
                                <td><?php echo htmlspecialchars($client['phone']); ?></td>
                                <td><?php echo htmlspecialchars($client['company']); ?></td>
                                <td><button class="btn-sm btn btn-danger">Delete</button></td>
                                <td><button class="btn-sm btn btn-warning">Edit</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<?php require '../parts/bottom.php'; ?>