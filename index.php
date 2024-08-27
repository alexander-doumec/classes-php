<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="index.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>User Management</title>

    <h1>Welcome to our site</h1>

    <!-- Registration form -->

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Welcome to our site</h1>

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Registration</h2>
                    </div>
                    <div class="card-body">
                        <form action="process_user.php" method="post">
                            <input type="hidden" name="action" value="register">
                            <div class="mb-3">
                                <label for="register_login" class="form-label">Login:</label>
                                <input type="text" class="form-control" id="register_login" name="login" required>
                            </div>
                            <div class="mb-3">
                                <label for="register_password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="register_password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="register_email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="register_email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="register_firstname" class="form-label">Firstname:</label>
                                <input type="text" class="form-control" id="register_firstname" name="firstname" required>
                            </div>
                            <div class="mb-3">
                                <label for="register_lastname" class="form-label">Lastname:</label>
                                <input type="text" class="form-control" id="register_lastname" name="lastname" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="process_user.php" method="post">
                            <input type="hidden" name="action" value="connect">
                            <div class="mb-3">
                                <label for="connect_login" class="form-label">Login:</label>
                                <input type="text" class="form-control" id="connect_login" name="login" required>
                            </div>
                            <div class="mb-3">
                                <label for="connect_password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="connect_password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-success">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>