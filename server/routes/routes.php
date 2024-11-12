<?php

return [
    '/' => function () {
        $age = array("Peter"=>35, "Ben"=>37, "Joe"=>43);
        echo json_encode($age);
    },
    '/teste' => function (array $params = []) {
        if (!empty($params["success"])) {
            echo "FOI COM PARAMETROS!!";
            return;
        }
        print_r($params);
    }
];