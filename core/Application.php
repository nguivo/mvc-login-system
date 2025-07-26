<?php

namespace app\core;

class Application
{
    public Request $request;
    public Router $router;

    public function __construct()
    {
        $this->request = new Request();
        $this->router = new Router($this->request);
    }


    public function run(): void
    {
        echo $this->router->resolve();
    }


    public static function dnd($var): void
    {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }

}
