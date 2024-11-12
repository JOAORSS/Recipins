<?php
include_once 'utils/routesProcesser.php';

$routes = [
    '/a' => function () {
        $age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
        $jairo = json_encode($age, JSON_PRETTY_PRINT);
        echo "
 
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #2d2d2d;
                color: #f0f0f0;
                padding: 20px;
            }
            pre {
                background-color: #333;
                padding: 20px;
                border-radius: 5px;
                font-size: 16px;
                line-height: 1.5;
                white-space: pre-wrap;
                word-wrap: break-word;
            }
            code {
                color: #ffd700;
            }
        </style>

        <pre><code>" . htmlspecialchars($jairo) . "</code></pre>

";
    },
    '/teste' => function (array $params = []) {
        echo "teste foi?";
        if (!empty($params["success"])) {
            echo "FOI COM PARAMETROS!!";
            return;
        }
        print_r($params);
    }
];


run($_SERVER["REQUEST_URI"], $routes);


