<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personnal Page</title>
</head>
<body>
    <h1>Hello, Mister <?php echo htmlspecialchars($user['lastname']) . ' ' . htmlspecialchars($user['firstname']); ?></h1>
    
    <!-- Disconnection bouton-->
    <form action="logout.php" method="post">
        <input type="submit" value="deconnect">
    </form>

    <!-- Form for deleting a User -->
    <form action="process_user.php" method="post">
    <input type="hidden" name="action" value="delete">
    <label for="delete_login">Login:</label>
    <input type="text" id="delete_login" name="login" required><br>

    <label for="delete_password">Password:</label>
    <input type="password" id="delete_password" name="password" required><br>

    <input type="submit" value="delete account">
</form>
</body>
</html>