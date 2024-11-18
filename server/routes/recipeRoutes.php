<?php

$app->routes->post("/receita", function () use ($app) {

    $receita = new Receita(0, $_POST["nome"], $_POST["descricao"], $_POST["tempo"], $_POST["ingredientes"], $_POST["preparo"], $_POST["data"], file_get_contents($_FILES["imagem"]["tmp_name"]));
    try {
       $app->database->receitas->insertRecipe($receita);
    } catch (\Throwable $th) {
        echo 'Erro: tente novamente';
    }
});

$app->routes->get("/images/receita", function (array $params = []) use ($app) {
    if (!empty($params)){
        $app->database->receitas->getRecipeImg($params["id"]);
    } else {
        echo "informe um id";
    }
});

$app->routes->get("/receitas", function () use ($app) {
    $app->database->receitas->getRecipes();
});

$app->routes->get("/receita", function (array $params = []) use ($app) {
    if (!empty($params["id"])){
        $app->database->receitas->getRecipe($params["id"]);
    } else {
        echo "Informe um id";
    }
});

$app->routes->delete("/recipe", function (array $params = []) use ($app) {
    if (!empty($params["id"])){
        $app->database->receitas->deleteRecipe($params["id"]);
    } else {
        echo "Informe um id";
    }
});

$app->routes->put("/recipe", function (array $params = []) use ($app) {
    if (!empty($params["id"])){
        $app->database->receitas->updateRecipe($params["id"]);
    } else {
        echo "Informe um id";
    }
});