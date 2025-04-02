<?php require './core/db.php'; ?>
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registracija</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <h2 class="text-center">Registracija</h2>
                    <form action="../src/register_process.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Ime</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lozinka</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Uloga</label>
                            <select name="role" class="form-control">
                                <option value="employee">Zaposleni</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Registruj se</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
