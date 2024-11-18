<?php
include_once 'crud.php';

class Receitas extends Crud {
   public function __construct(PDO $conection) {
    parent::__construct($conection);
   }

   
   function getRecipeImg (int $id) : void{
    header("Content-Type: image/jpeg");

    $stmt = $this->conection->prepare("SELECT receita_id, foto FROM receitas WHERE receita_id = ?");
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->execute();

    $recipe = $stmt->fetch(PDO::FETCH_OBJ);

    if (isset($recipe->foto)){
        echo $recipe->foto;
    } else {
        header("Content-Type: text/html");
        echo "Erro: id não existente";
    }

}

function getUserByEmail (string $email) : void{
    $stmt = $this->conection->prepare("SELECT usuario_id, email, nome FROM usuarios WHERE email = ?");
    $stmt->bindParam(1, $email, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_OBJ);

    echo json_encode($user, JSON_PRETTY_PRINT);
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

function updateUser (int $id, Usuario $user) : void {
    $stmt = $this->conection->prepare("UPDATE usuarios SET email = ?, nome = ?, foto = ? WHERE usuario_id = ?");

    $stmt->bindParam(1, $user->email, PDO::PARAM_STR);
    $stmt->bindParam(2, $user->nome, PDO::PARAM_STR);
    $stmt->bindParam(3, $user->foto, PDO::PARAM_LOB);
    $stmt->bindParam(4, $id, PDO::PARAM_INT);

    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $user->foto = null;
        echo json_encode($user, JSON_PRETTY_PRINT);
    } else {
        echo "Erro: a receita nao foi adicionada";
    }
}

function insertRecipe (Receita $receita): void {
    $stmt = $this->conection->prepare("INSERT INTO receitas (nome, descricao, ingredientes, tempo, preparo, foto, data) VALUES (?, ?, ?, ?, ?, ?)");
    
    $stmt->bindParam(1, $receita->nome, PDO::PARAM_STR);
    $stmt->bindParam(2, $receita->descricao, PDO::PARAM_STR);
    $stmt->bindParam(3, json_encode($receita->ingredientes), PDO::PARAM_STR);
    $stmt->bindParam(4, $receita->tempo, PDO::PARAM_INT);
    $stmt->bindParam(5, $receita->preparo, PDO::PARAM_STR);
    $stmt->bindParam(6, $receita->foto, PDO::PARAM_LOB);
    
    if ($stmt->execute()) {
        echo json_encode($this->conection->lastInsertId(), JSON_PRETTY_PRINT);
    } else {
        echo "Erro: esta receita não foi adicionado";
    }
}

function getRecipes () : void { 
    $stmt = $this->conection->prepare("SELECT receita_id, nome, descricao, ingredientes, tempo, preparo, data FROM receitas");
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $recipes = $stmt->fetchAll(PDO::FETCH_OBJ);

        foreach ($recipes as $recipe){
            $recipe->foto = "http://localhost/Recipins/server/index.php/images/receita?id=$recipe->receita_id";
        }

        echo json_encode($recipes, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    } else {
        echo json_encode([]);
    }
}

function getRecipe (int $id) : void {
    $stmt = $this->conection->prepare("SELECT receita_id, nome, descricao, ingredientes, tempo, preparo, data, foto FROM receitas WHERE receita_id = ?");
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $recipe = $stmt->fetch(PDO::FETCH_OBJ);

        $recipe->foto = "http://localhost/Recipins/server/index.php/images/receita?id=$id";

        echo json_encode($recipe, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    } else {
        echo json_encode([]);
    }

}

function deleteRecipe (int $id) : void {
    $stmt = $this->conection->prepare("DELETE FROM receitas WHERE receita_id = ?");
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        echo "Receita deletada";
    } else {
        echo "Erro: possivelmente este ID não existe";
    }
}

function updateRecipe (Receita $receita) : void {
    $stmt = $this->conection->prepare("UPDATE receitas SET nome = ?, descricao = ?, ingredientes = ?, tempo = ?, preparo = ?, foto = ?, data = ? WHERE receita_id = ?");
    
    $stmt->bindParam(1, $receita->nome, PDO::PARAM_STR);
    $stmt->bindParam(2, $receita->descricao, PDO::PARAM_STR);
    $stmt->bindParam(3, json_encode($receita->ingredientes), PDO::PARAM_STR);
    $stmt->bindParam(4, $receita->tempo, PDO::PARAM_INT);
    $stmt->bindParam(5, $receita->preparo, PDO::PARAM_STR);
    $stmt->bindParam(6, $receita->foto, PDO::PARAM_LOB);
    $stmt->bindParam(7, $id, PDO::PARAM_INT);

    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $receita->foto = null;
        echo json_encode($receita, JSON_PRETTY_PRINT);
    } else {
        echo "Erro: a receita nao foi adicionada";
    }

}
}