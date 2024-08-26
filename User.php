<?php
class User
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $firstname;
    public $lastname;
    private $connection;
    private $isConnected = false;

    //constructor to initialize database connection

    public function _construct($host, $username, $password, $database)
    {
        $this->connection = new mysqli($host, $username, $password, $database);

        //Verify connection
        if ($this->connection->connect_error) {
            die("Connection failed : " . $this->connection->connect_error);
        }
    }

    //Method to register a new user
    public function register($login, $password, $email, $firstname, $lastname)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->connection->prepare("INSERT INTO utilisateurs (login, $hashedPassword, $email, $firstname, $lastname) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $login, $hashedPassword, $email, $firstname, $lastname);
        $stmt->execute();
        $stmt->close();

        return $this->getUserInfo($login);
    }
    
    //Method to connect a user

    public function connect($login,$password){
        $stmt = $this->connection->prepare("SELECT * FROM utilisateurs WHERE login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    }

}
