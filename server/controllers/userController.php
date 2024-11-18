<?php
include_once 'crud.php';

class Usuarios extends Crud {
    public function __construct(PDO $conection) {
     parent::__construct($conection);
    }

    function insertUser (Usuario $usuario) : void {
        $senha = password_hash($usuario->senha, PASSWORD_ARGON2ID);

        $stmt = $this->conection->prepare("INSERT INTO usuarios (email, nome, senha, foto) VALUES (?, ?, ?, ?)");

        $stmt->bindParam(1, $usuario->email, PDO::PARAM_STR);
        $stmt->bindParam(2, $usuario->nome, PDO::PARAM_STR);
        $stmt->bindParam(3, $senha, PDO::PARAM_STR);
        $stmt->bindParam(4, $usuario->foto, PDO::PARAM_LOB);
        
        if ($stmt->execute()) {
            $id = $this->conection->lastInsertId();
            echo $this->getUser($id);
        } else {
            echo "Erro: este usuario não foi adicionado";
        }
        
    }

    function getUsers () : void {
        $stmt = $this->conection->prepare("SELECT usuario_id, nome, email, foto FROM usuarios");
        $stmt->execute();

        if ($stmt->rowCount() > 0){
            $users = $stmt->fetchAll(PDO::FETCH_OBJ);

            foreach ($users as $user){
                $user->foto = "http://localhost/Recipins/server/index.php/images/usuario?id=$user->usuario_id";
            }

            echo json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        } else {
            echo json_encode([]);
        }

    }

    function getUser (int $id): void {
        $stmt = $this->conection->prepare("SELECT usuario_id, nome, email, foto FROM usuarios WHERE usuario_id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_OBJ);
    
            $user->foto = "http://localhost/Recipins/server/index.php/images/usuario?id=$id";
    
            echo json_encode($user, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        } else {
            echo json_encode([]);
        }
    }

    function getUserImg (int $id) : void{
        header("Content-Type: image/jpeg");
        $stmt = $this->conection->prepare("SELECT usuario_id, foto FROM usuarios WHERE usuario_id = ?");
        $stmt->bindParam(1, $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_OBJ);

        if (isset($user->foto)){
            echo $user->foto;
        } else {
            header("Content-Type: text/html");
            echo "Erro: id não existente";
        }
    }

} 