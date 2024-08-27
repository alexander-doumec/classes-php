<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h1 class="mb-0">Welcome, Mr. <?php echo htmlspecialchars($user['lastname']) . ' ' . htmlspecialchars($user['firstname']); ?></h1>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-4">
                            <!-- Logout button -->
                            <form action="logout.php" method="post">
                                <button type="submit" class="btn btn-warning">Logout</button>
                            </form>

                            <!-- Delete Account button (triggers modal) -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                                Delete Account
                            </button>
                        </div>

                        <!-- User Information -->
                        <h2 class="mb-3">Your Information</h2>
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Login:</strong> <?php echo htmlspecialchars($user['login']); ?></li>
                            <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></li>
                            <li class="list-group-item"><strong>First Name:</strong> <?php echo htmlspecialchars($user['firstname']); ?></li>
                            <li class="list-group-item"><strong>Last Name:</strong> <?php echo htmlspecialchars($user['lastname']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Account Modal -->
    <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteAccountModalLabel">Delete Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button