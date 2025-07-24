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


    public function run()
    {
        echo "Hello World!";
        $this->request->getPath();
    }


    public static function dnd($var)
    {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }

}
