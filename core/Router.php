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


    public function post($path, $callback): null
    {
        $this->routes['post'][$path] = $callback;

        return null;
    }


    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false) {
            Application::$app->response->setStatusCode(404);
            return $this->renderView('_404');
        }
        if(is_string($callback)) {
            return $this->renderView($callback);
        }

        if(is_array($callback)) {
            $callback[0] = new $callback[0];
        }

        return call_user_func($callback);
    }

    public function renderView(string $view, $params = []): string
    {
        $layout = $this->layoutContent();
        $viewContent = $this->viewContent($view, $params);
        return str_replace('{{content}}', $viewContent, $layout);
    }


    // returns the content of the layout file
    protected function layoutContent(): string
    {
        ob_start();
        include_once Application::$ROOT_DIR."/views/layouts/main.php";
        return ob_get_clean();
    }


    // returns the contents of the view file
    protected function viewContent(string $view, $params = []): string
    {
        if($params) {
            foreach($params as $key => $value) {
                $$key = $value;
            }
        }

        ob_start();
        include_once Application::$ROOT_DIR."/views/$view.php";
        return ob_get_clean();
    }


}
