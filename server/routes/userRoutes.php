<?php

$app->routes->post("/usuario", function () use ($app) {

    $usuario = new usuario(0, $_POST["nome"], $_POST["email"], file_get_contents($_FILES["imagem"]["tmp_name"]), $_POST["senha"]);
    try {
        $app->database->usuarios->insertUser($usuario);
    } catch (\Throwable $th) {
        echo 'Erro: tente novamente, posivelmente este email já existe';
    }
});

$app->routes->get("/images/usuario", function (array $params = []) use ($app) {
    if (!empty($params)){
        $app->database->usuarios->getUserImg($params["id"]);
    } else {
        echo "informe um id";
    }
});

$app->routes->get("/usuarios", function () use ($app){
    $app->database->usuarios->getUsers();
});

$app->routes->get("/usuario", function (array $params = []) use ($app) {
    if (!empty($params["id"])){
        $app->database->usuarios->getUser($params["id"]);
    } else {
        echo "Informe um id";
    }
});

$app->routes->delete("/usuario", function (array $params = []) use ($app) {
    if (!empty($params["id"])){
        $app->database->usuarios->deleteUser($params["id"]);
    } else {
        echo "Informe um id";
    }
});

