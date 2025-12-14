<?php

namespace SimpleApi;
require_once "Router.php";
class Application{
    public function start(){
        $router = new Router();
        $router->addRoute("GET", "/", function(){

        });

        $router->addRoute("GET", "/hello", function (){
            echo  "hello world";
        });

        $router->iniciarRotas();
    }
}