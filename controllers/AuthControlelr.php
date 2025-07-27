<?php

namespace app\controllers;

use app\core\Controller;

class AuthControlelr extends Controller
{

    public function login(): string
    {
        return $this->render('/login');
    }


    public function register(): string
    {
        return $this->render('/register');
    }

}
