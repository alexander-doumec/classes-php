<?php
session_start();
require_once 'User.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    $login = $_POST['login'] ?? null;
    $password = $_POST['password'] ?? null;
    $email = $_POST['email'] ?? null;
    $firstname = $_POST['firstname'] ?? null;
    $lastname = $_POST['lastname'] ?? null;

    // Create an instance of the user class
    $user = new User('localhost', 'root', '', 'classes');

    switch ($action) {
        case 'register':
            // Register a User
            $newUser = $user->register($login, $password, $email, $firstname, $lastname);
            if ($newUser) {
                echo "<p>You are now a member, please login.</p>";
                header("Refresh: 2; url=index.php");
            } else {
                echo "<p>Erreur lors de l'enregistrement de l'utilisateur.</p>";
            }
            break;

        case 'connect':
            // Connect a User
            $user->connect($login, $password);
            if ($user->isConnected()) {
                $_SESSION['user'] = $user->getAllInfos();
                header("Location: personal_page.php");
                exit();
            } else {
                echo "<p>Échec de la connexion.</p>";
                header("Refresh: 2; url=index.php");
            }
            break;

        case 'delete':
            // Connect the user to delete 
            if ($login && $password) {
                $user->connect($login, $password);
                if ($user->isConnected()) {
                    $user->delete();
                    echo "<p>Utilisateur supprimé avec succès.</p>";
                    session_destroy();
                    header("Refresh: 2; url=index.php");
                } else {
                    echo "<p>Échec de la suppression de l'utilisateur.</p>";
                }
            } else {
                echo "<p>Informations manquantes pour la suppression.</p>";
            }
            break;

        default:
            echo "<p>Action non reconnue.</p>";
            break;
    }
}
?>