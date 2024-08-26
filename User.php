<?php
class User
{
    public $id;
    public $login;
    public $email;
    public $firstname;
    public $lastname;
    private $connection;
    private $isConnected = false;

    //constructor to initialize database connection

    public function __construct($host, $username, $password, $database)
    {
        $this->connection = new mysqli($host, $username, $password, $database);

        //Verify connection
        if ($this->connection->connect_error) {
            die("Connection failed : " . $this->connection->connect_error);
        }
    }

    //Method to register a new user
    public function register($login, $password, $email, $firstname, $lastname) {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->connection->prepare("INSERT INTO utilisateurs (login, password, email, firstname, lastname) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $login, $hashedPassword, $email, $firstname, $lastname);
        $stmt->execute();
        $stmt->close();

        return $this->getUserInfo($login);
    }
    
    //Method to connect a user

    public function connect($login,$password) {
        $stmt = $this->connection->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $this->id = $user['id'];
            $this->login = $user['login'];
            $this->email = $user['email'];
            $this->firstname = $user['firstname'];
            $this->lastname = $user['lastname'];
            $this->isConnected = true;
        }

        $stmt->close();

    }

    //Method to disconnect the user 

    public function disconnect(){
        $this->id = null;
        $this->login = null;
        $this->email = null;
        $this->firstname = null;
        $this->lastname = null;
        $this->isConnected = false;
    }

    //Method to delete a User

    public function delete(){
        if ($this->isConnected) {
            $stmt = $this->connection->prepare("DELETE FROM utilisateurs WHERE id = ?");
            $stmt->bind_param("i", $this->id);
            $stmt->execute();
            $stmt->close();
            $this->disconnect();
        }

    }
    //Method to update a User

    public function update($login, $password, $email, $firstname, $lastname){
        if ($this->isConnected) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $this->connection->prepare("UPDATE utilisateurs SET login = ?, password = ?, email = ?, firstname = ?, lastname = ? WHERE id = ?");
            $stmt->bind_param("sssssi", $login, $hashedPassword, $email, $firstname, $lastname, $this->id);
            $stmt->execute();
            $stmt->close();
        }
    }

    //Verify if user is connected 
    public function isConnected() {
        return $this->isConnected;
    }

    //Return user informations

    public function getAllInfos() {
        if ($this->isConnected) {
            return [
                "id"=> $this->id,
                "login"=> $this->login,
                "email"=> $this->email,
                "firstname"=> $this->firstname,
                "lastname"=> $this->lastname
            ];
    }
    return null;

    }
    //Return email user
    public function getEmail() {
        return $this->email;
    }

    //Return user Firstname
    public function getFirstname() {
        return $this->firstname;
    }

    //return user Lastname
    public function getLastname() {
        return $this->lastname;
    }

    //Method to get User info by login 
    private function getUserInfo($login) {
        $stmt = $this->connection->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();
        return $user;
    }

    //Fermer la connexion à la base de données
    public function __destruct() {
        $this->connection->close();
    }

}

?>