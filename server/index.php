<?php

include_once 'app.php';
include_once 'models/usuario.php';
include_once 'models/receita.php';

header("Content-Type: application/json");

$app = new App();

require_once 'routes/userRoutes.php';
require_once 'routes/recipeRoutes.php';

$app->run($_SERVER["REQUEST_URI"], $app->routes->getRoutes());

?>