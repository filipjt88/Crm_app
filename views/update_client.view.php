<?php

require '../core/db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die("Nevažeći ID");
}

$sql = "SELECT * FROM clients WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$client = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$client) {
    die("Klijent nije pronađen.");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-9 offset-1 mt-5">
                <h1 class="text-center mb-5">Update client</h1>
                <form action="../update_client.php" id="updateForm" method="POST">
                    <input type="hidden" name="id" value="<?php echo $client['id']; ?>">
                    <input type="text" id="first_name" class="form-control" placeholder="First name ..." value="<?= htmlspecialchars($client['first_name']) ?>required><br>
                    <input type="text" id="last_name" class="form-control" placeholder="Last name ..." value="<?= htmlspecialchars($client['last_name']) ?> required><br>
                    <input type="email" id="email" class="form-control" placeholder="Email ..." value="<?= htmlspecialchars($client['email']) ?> required><br>
                    <input type="text" id="phone" class="form-control" placeholder="First name ..." value="<?= htmlspecialchars($client['phone']) ?>required><br>
                    <textarea name="notes" id="notes" class="form-control" placeholder="Notes . . ." value="<?= htmlspecialchars($client['notes']) ?> required></textarea><br>
                    <button type="submit" onclick="updateClient()" class="form-control btn-sm btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
<script src="../js/main.js"></script>
</body>
</html>