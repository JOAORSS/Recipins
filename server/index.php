<?php

include_once 'app.php';
include_once 'models/usuario.php';
include_once 'models/receita.php';

header("Content-Type: application/json");

$app = new App();

$app->routes->get("/usuarios", function () use ($app){
    $app->database->crud->listarUsuarios();
});

$app->routes->get("/usuario", function (array $params = []) use ($app) {
    if (!empty($params["id"])){
        $app->database->crud->getUser($params["id"]);
    } else {
        echo "Informe um id";
    }
});

$app->routes->post("/usuario", function () use ($app) {

    $usuario = new usuario(0, $_POST["nome"], $_POST["email"], "aasdasacercewasdas", $_POST["senha"]);
    try {
        $retorno = $app->database->crud->insertConta($usuario);
        $retorno = $retorno == true ? "true" : "false";
        if ($retorno) {
            $app->database->crud->getUserByEmail($usuario->email);
        } else {
            echo "Erro: usuario não foi adicionado";
        }
    } catch (\Throwable $th) {
        echo 'Erro: tente novamente, posivelmente este email já existe';
    }
    
});

$app->routes->delete("/usuario", function (array $params = []) use ($app) {
    if (!empty($params["id"])){
        $app->database->crud->deleteUser($params["id"]);
    } else {
        echo "Informe um id";
    }
});

$app->routes->post("/receita", function () use ($app) {

    $receita = new Receita(0, $_POST["nome"], $_POST["descricao"], $_POST["tempo"], $_POST["ingredientes"], $_POST["preparo"], $_POST["data"], file_get_contents($_FILES["imagem"]["tmp_name"]));
    try {
        $retorno = $app->database->crud->insertReceita($receita);
        if ($retorno) {
            echo "Receita adicionada com sucesso";
        } else {
            echo "Erro: receita não adicionado";
        }

    } catch (\Throwable $th) {
        echo 'Erro: tente novamente';
    }
    
});

$app->routes->get("/receita", function (array $params = []) use ($app) {
    if (!empty($params["id"])){
        $app->database->crud->getRecipe($params["id"]);
    } else {
        echo "Informe um id";
    }
});


$app->run($_SERVER["REQUEST_URI"], $app->routes->getRoutes());

?>