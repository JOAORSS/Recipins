<?php

include_once "index.php";
global $app;

header("Content-type: text/html");

// $id = $_GET['id'];

$produtoImg = $app->database->crud->trazerImgUsuario("21");

// $produtoImg->tratarImagem();