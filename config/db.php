<?php

include_once '../server/controllers/recipeController.php';
include_once '../server/controllers/userController.php';

class Database extends PDO {
        
    private string $host;
    private string $db;
    private string $user;
    private string $password;
    public Receitas $receitas;
    public Usuarios $usuarios;
    public PDO $database;

    function __construct(){
        
        $this->host = "localhost";
        $this->db = "recipins";
        $this->user = "root";
        $this->password = "";
        $this->database = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
        $this->receitas = new Receitas($this->database);
        $this->usuarios = new Usuarios($this->database);

    }

    function getDatabase(){
        return get_object_vars($this->database);
    }
    
}


?>