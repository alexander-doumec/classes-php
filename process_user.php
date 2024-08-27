<?php
session_start();
require_once 'User.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'] ?? '';
    $login = $_POST['login'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';
    $firstname = $_POST['firstname'] ?? '';
    $lastname = $_POST['lastname'] ?? '';

    // Create an instance of the User class
    $user = new User('localhost', 'root', '', 'classes');

    switch ($action) {
        case 'register':
            // Register a new user
            $newUser = $user->register($login, $password, $email, $firstname, $lastname);
            if ($newUser) {
                echo "<p>You are now a member, please login.</p>";
                header("Refresh: 2; url=index.php");
            } else {
                echo "<p>Error during user registration.</p>";
            }
            break;

        case 'connect':
            // Connect a user
            if ($user->connect($login, $password)) {
                $_SESSION['user'] = $user->getAllInfos();
                header("Location: personal_page.php");
                exit();
            } else {
                echo "<p>Login failed.</p>";
                header("Refresh: 2; url=index.php");
            }
            break;

        case 'delete':
            // Delete the connected user's account
            if (isset($_SESSION['user'])) {
                $user->connect($_SESSION['user']['login'], $password); // Reconnect for verification
                if ($user->isConnected() && $user->delete()) {
                    echo "<p>Account successfully deleted.</p>";
                    session_destroy();
                    header("Refresh: 2; url=index.php");
                } else {
                    echo "<p>Failed to delete the account.</p>";
                }
            } else {
                echo "<p>You must be logged in to delete your account.</p>";
            }
            break;

        default:
            echo "<p>Action not recognized.</p>";
            break;
    }
} else {
    // Redirect if the form has not been submitted
    header("Location: index.php");
    exit();
}
?>