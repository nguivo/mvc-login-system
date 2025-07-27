<?php

namespace app\core;

/**
 * @desc this class takes the request string and beaks it into request_uri, method and parameters if any, and returns them
 *
 * */
class Request
{

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if($position === false) {
            return $path;
        }

        return substr($path, 0, $position);
    }


    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }


    public function getBody(): array
    {
        $body = [];
        if($this->getMethod() === 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if($this->getMethod() === 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }

}
