<?php

namespace SimpleApi; // a classe router pertence ao namespace SimpleApi
// se eu quiser usar essa classe Router ela tem que referenciar o namespace

// exemplo aqui para salvar -> use SimplesApi\Router

class Router{
    protected $routes = []; // inicializei com array vazio, vou inserir rotas deṕois dentro dele

    // criando metodo para iniciar rotas
    public function addRoute(
        string $method, // metodo HTTP que será usado
        string $path,  // url e rota usada /url/rota
        callable $callback // funcao executada nessa rota

    ){
        $this->routes[$method][$path] = $callback;
    }

    public function verificarRotas(string $method, string $path){
        // verifico se existe essa rota, se sim ela retorna e pode ser acessada
        if(isset($this->routes[$method][$path])){
            return $this->routes[$method][$path];
        } else{
            echo "rota não encontrada";
       }
    }

    public function Hello(){
        echo "Hello, você está na rota hello";
    }
    // funcao para executar as rotas
    public function iniciarRotas(){

        // content-type para configurar resposta ( para json )

        header('Content-type: application/json');



        $httpMethod = $_SERVER['REQUEST_METHOD'];

        // verifico se o metodo existe em minhas rotas

        if(isset($this->routes[$httpMethod])){
            // percorro em todas as rotas com o metodo escolhido
            foreach($this->routes[$httpMethod] as $path => $callback){
                // se a rota existir retorna callback

                if($path === $_SERVER['REQUEST_URI']){
                    return $callback;
                }
            }
        }

        // caso n exista

        http_response_code(404);


    }
}
