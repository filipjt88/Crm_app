<?php $title = 'Register'; ?>
<?php require '../core/db.php'; ?>
<?php require '../parts/top.php'; ?>
<?php require '../parts/navbar.php'; ?>
    <div class="container d-flex align-items-center justify-content-center vh-100">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg p-4">
                    <h2 class="text-center">Registracija</h2>
                    <form action="../controller/register.php" method="POST">
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
<?php require '../parts/bottom.php'; ?>

