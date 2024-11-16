<?php

class Routes {
    public $routes;

    function __construct() {
        $this->routes = [];
    }

    function getRoutes() : array {
        return $this->routes;
    }

        /**
     * Define a rota e executa a ação associada.
     *
     * @param string $newRoute O caminho da rota (deve começar com '/')
     * @param callable $action o que deve ser execurado ao acessar a rota
     * 
     * @throws InvalidArgumentException Se a rota não começar com '/'
     */
    
    function get (string $newRoute, callable $action) : void {
        if (!str_starts_with($newRoute, '/')) {
            throw new InvalidArgumentException("O parâmetro 'route' deve começar com '/'.");    
        }

        if (array_key_exists($newRoute, $this->routes) === true) {
            $this->routes[$newRoute]["GET"] = $action;

        } else {

            $this->routes[$newRoute] = ["GET" => $action];
        }
        return;
    }
    
        /**
     * Define a rota e executa a ação associada.
     *
     * @param string $newRoute O caminho da rota (deve começar com '/')
     * @param callable $action o que deve ser execurado ao acessar a rota
     * 
     * @throws InvalidArgumentException Se a rota não começar com '/'
     */

    function post (string $newRoute, callable $action) : void {
        if (!str_starts_with($newRoute, '/')) {
                throw new InvalidArgumentException("O parâmetro 'route' deve começar com '/'.");
            }
            
            if (array_key_exists($newRoute, $this->routes) === true) {
                $this->routes[$newRoute]["POST"] = $action;
    
            } else {
    
                $this->routes[$newRoute] = ["POST" => $action];
            }
            return;
    }

    /**
    * Define a rota e executa a ação associada.
    *
    * @param string $newRoute O caminho da rota (deve começar com '/')
    * @param callable $action o que deve ser execurado ao acessar a rota
    * 
    * @throws InvalidArgumentException Se a rota não começar com '/'
    */

    function delete (string $newRoute, callable $action) :void {
        if (!str_starts_with($newRoute, '/')) {
            throw new InvalidArgumentException("O parâmetro 'route' deve começar com '/'.");
        }
        
        if (array_key_exists($newRoute, $this->routes) === true) {
            $this->routes[$newRoute]["DELETE"] = $action;

        } else {

            $this->routes[$newRoute] = ["DELETE" => $action];
        }
        return;
    }

    /**
    * Define a rota e executa a ação associada.
    *
    * @param string $newRoute O caminho da rota (deve começar com '/')
    * @param callable $action o que deve ser execurado ao acessar a rota
    * 
    * @throws InvalidArgumentException Se a rota não começar com '/'
    */
    
    function put (string $newRoute, callable $action) : void{
        if (!str_starts_with($newRoute, '/')) {
            throw new InvalidArgumentException("O parâmetro 'newRoute' deve começar com '/'.");
        }

        if (array_key_exists($newRoute, $this->routes) === true) {
            $this->routes[$newRoute]["PUT"] = $action;

        } else {

            $this->routes[$newRoute] = ["PUT" => $action];
        }
        return;
    }
}

?>