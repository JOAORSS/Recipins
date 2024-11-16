<?php

class Crud {
    public PDO $conection;
    
    function __construct($conection){
        $this->conection = $conection;
    }

    function insertConta (Usuario $usuario): bool {
        $senha = password_hash($usuario->senha, PASSWORD_ARGON2ID);

        $stmt = $this->conection->prepare("INSERT INTO usuarios (email, nome, senha, foto) VALUES (?, ?, ?, ?)");

        $stmt->bindParam(1, $usuario->email, PDO::PARAM_STR);
        $stmt->bindParam(2, $usuario->nome, PDO::PARAM_STR);
        $stmt->bindParam(3, $senha, PDO::PARAM_STR);
        $stmt->bindParam(4, $usuario->foto, PDO::PARAM_LOB);
        
        if ($stmt->execute()) {
            $return = true;
        } else {
            $return = false;
        }
        
        return $return;
    }
    
    function insertReceita (Receita $receita): bool {
        $stmt = $this->conection->prepare("INSERT INTO receitas (nome, descricao, ingredientes, tempo, preparo, foto, data) VALUES (?, ?, ?, ?, ?, ?)");
        
        $stmt->bindParam(1, $receita->nome, PDO::PARAM_STR);
        $stmt->bindParam(2, $receita->descricao, PDO::PARAM_STR);
        $stmt->bindParam(3, json_encode($receita->ingredientes), PDO::PARAM_STR);
        $stmt->bindParam(4, $receita->tempo, PDO::PARAM_INT);
        $stmt->bindParam(5, $receita->preparo, PDO::PARAM_STR);
        $stmt->bindParam(6, $receita->foto, PDO::PARAM_LOB);
        
        try {
            $return = $stmt->execute() ? false : true ;
        } catch (Throwable $e) {
            echo "Erro: $e";
            $return = false;
        }
        
        return $return;
    }

    function listarUsuarios():void {
        $stmt = $this->conection->prepare("SELECT usuario_id, nome, email FROM usuarios");
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_OBJ);

        echo json_encode($users, JSON_PRETTY_PRINT);
        return;
    }

    function getUser (int $id): void {
        $stmt = $this->conection->prepare("SELECT usuario_id, nome, email FROM usuarios WHERE usuario_id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_OBJ);

        // $user->foto = base64_encode($user->foto);

        echo json_encode($user, JSON_PRETTY_PRINT);
        return;
    }

    function getImgUsuario (int $id) : void{
        $stmt = $this->conection->prepare("SELECT usuario_id, nome, foto FROM usuarios WHERE usuario_id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_OBJ);

        $user = new Usuario($user->usuario_id, $user->nome, "", $user->foto, "");
        echo json_encode($user);
    }

    function getUserByEmail (string $email) : void{
        $stmt = $this->conection->prepare("SELECT usuario_id, email, nome, foto FROM usuarios WHERE email = ?");
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_OBJ);

        echo json_encode($user, JSON_PRETTY_PRINT);
    }

    function getRecipes () : void {
        $stmt = $this->conection->prepare("SELECT usuario_id, nome, email FROM usuarios");
        $stmt->execute();

        $users = $stmt->fetchAll(PDO::FETCH_OBJ);

        echo json_encode($users, JSON_PRETTY_PRINT);
        return;
    }
    
    function getRecipe () : void {
        $stmt = $this->conection->prepare("SELECT usuario_id, nome, email FROM usuarios WHERE usuario_id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetchAll(PDO::FETCH_OBJ);

        echo json_encode($user, JSON_PRETTY_PRINT);
        return;        
    }

    function deleteUser (int $id) : void {
        $stmt = $this->conection->prepare("DELETE FROM usuarios WHERE usuario_id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            echo "Usuario deletado";
        } else {
            echo "erro";
        }
    }
 
}
