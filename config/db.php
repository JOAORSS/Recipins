<?php

class database extends PDO {
        
    private string $host  = "localhost";
    private string $db = "recipins";
    private string $user = "root";
    private string $password = "";
    protected PDO $database = new PDO("mysql:$this->host;dbname=$this->db", $this->user, $this->password);
    public crud $CRUD;

    function __construct($host, $db, $user, $password, $CRUD){
        
        parent::__construct($host, $db, $user, $password);
        
        $this->host = $host;
        $this->db = $db ;
        $this->user = $user;
        $this->password = $password;
        $this->$CRUD = $CRUD;
        

    }
    
}