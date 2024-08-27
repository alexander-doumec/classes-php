<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs</title>
</head>
<body>
    <h1>Bienvenue sur notre site</h1>

    <!-- Form to register  -->
    <h2>Inscription</h2>
    <form action="process_user.php" method="post">
        <input type="hidden" name="action" value="register">
        <label for="register_login">Login:</label>
        <input type="text" id="register_login" name="login" required><br>

        <label for="register_password">Password:</label>
        <input type="password" id="register_password" name="password" required><br>

        <label for="register_email">Email:</label>
        <input type="email" id="register_email" name="email" required><br>

        <label for="register_firstname">Firstname:</label>
        <input type="text" id="register_firstname" name="firstname" required><br>

        <label for="register_lastname">Lastname:</label>
        <input type="text" id="register_lastname" name="lastname" required><br>

        <input type="submit" value="S'inscrire">
    </form>

    <!-- Form to connect -->
    <h2>Connexion</h2>
    <form action="process_user.php" method="post">
        <input type="hidden" name="action" value="connect">
        <label for="connect_login">Login:</label>
        <input type="text" id="connect_login" name="login" required><br>

        <label for="connect_password">Password:</label>
        <input type="password" id="connect_password" name="password" required><br>

        <input type="submit" value="log in">
    </form>
</body>
</html>