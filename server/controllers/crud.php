<?php

class Crud {
    protected PDO $conection;
    
    function __construct(PDO $conection){
        $this->conection = $conection;
    }

}
