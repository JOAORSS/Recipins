<?php

include_once '../config/db.php';
include_once 'routes/routes.php';

class App {
    public Database $database;
    public Routes $routes;

    function __construct(){
        $this->database = new Database();
        $this->routes = new Routes();      
    }

    function run(string $url, array $routes): void {
        $caller = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1)[0]['file'];
        $arquivo = explode(DIRECTORY_SEPARATOR, $caller);
        $arquivo = end($arquivo);
        $beforeSlash = substr($arquivo, 0, -4);
        $afterSlash = substr($arquivo, -4);
        $regex = $beforeSlash."\\".$afterSlash;
    
        $uri = parse_url($url);
        $path = preg_replace('#^.*/'.$regex.'#', '', $uri["path"]);
    
        if (array_key_exists($path, $routes)) {
    
            if (array_key_exists($_SERVER["REQUEST_METHOD"], $routes[$path])){
                $callback = $routes[$path][$_SERVER["REQUEST_METHOD"]];
                $params = [];
    
                if (!empty($uri["query"])) {
                    parse_str($uri["query"], $params);
                }
    
            } else {
    
                echo "Cannot access /".$_SERVER['REQUEST_METHOD'];
            }
        } else {
            return;    
        }
        $callback($params);
    }
    
}

?>