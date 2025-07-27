<?php

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public static Application $app;
    public Request $request;
    public Response $response;
    public Router $router;

    public function __construct(string $rootPath)
    {
        self::$ROOT_DIR = $rootPath;
        self::$app = $this;

        $this->request = new Request();
        $this->response = new Response();
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
