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
                <form id="updateForm" action="./add_client.php" method="POST">
                    <input type="hidden" id="clientId">
                    <input type="text" id="firstName" name="first_name" class="form-control" placeholder="First name ..." required><br>
                    <input type="text" id="lastName" name="last_name" class="form-control" placeholder="Last name ..." required><br>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email ..." required><br>
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="First name ..." required><br>
                    <textarea name="notes" id="notes" class="form-control" placeholder="Notes . . ." required></textarea><br>
                    <button type="submit" class="form-control btn-sm btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>