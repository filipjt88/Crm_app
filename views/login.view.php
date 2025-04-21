<?php $title = 'Login'; ?>
<?php require '../core/db.php'; ?>
<?php require '../parts/top.php'; ?>
<?php require '../parts/navbar.php'; ?>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-lg p-4">
                    <h2 class="text-center">Prijava</h2>
                    <form action="../controller/login.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lozinka</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Prijavi se</button>
                    </form>
                    <p class="text-center mt-3">Nemate nalog? <a href="register.view.php">Registrujte se</a></p>
                </div>
            </div>
        </div>
    </div>

<?php require '../parts/bottom.php'; ?>
