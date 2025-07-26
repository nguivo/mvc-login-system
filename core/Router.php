<?php

namespace app\core;

/**
 * @desc This class:
 * - registers routes from the index.php file
 * - i.e., when a particular string is requested, which method from what class should be called.
 * - it also, gets the pieces of the request by making use of the request class, and then invoking the appropriate callback functions. *
 * */
class Router
{
    public Request $request;
    protected array $routes = [];


    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get($path, $callback): null
    {
        $this->routes['get'][$path] = $callback;

        return null;
    }


    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false) {
            return "not found!";
        }
        if(is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
    }

    private function renderView(string $view)
    {
        include_once dirname(__DIR__)."/views/{$view}.php";
    }


}
