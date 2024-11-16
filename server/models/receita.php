<?php

class Receita{
    public int $id;
    public string $nome;
    public string $descricao;
    public int $tempo;
    public array $ingredientes;
    public string $preparo;
    public string $data;
    public string $foto;

    function __construct($id, $nome, $descricao, $tempo, $ingredientes, $preparo, $data, $foto){
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->tempo = $tempo;
        $this->ingredientes = $ingredientes;
        $this->preparo = $preparo;
        $this->data = $data;
        $this->$foto = $foto;
    }

    public function tratarImagem():void{
        echo $this->foto;
        return;
}
        
}