<?php

class usuario {
    public int $id;
    public string $nome;
    public string $email;
    public string $foto;
    public string $senha;

    function __construct($id, $nome, $email, $foto, $senha){
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->foto = $foto;
        $this->senha = $senha;
    }

    function __toString(){
        return "ID: $this->id, NOME: $this->nome, EMAIL: $this->email";
    }

    public function tratarImagem():void{
            header("Content-type: image");
            echo $this->foto;
            return;
    }
}