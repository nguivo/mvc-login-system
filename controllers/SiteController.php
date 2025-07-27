<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;

class SiteController extends Controller
{

    public function home(): string
    {
        $params = [
            'name' => 'PHP MVC Home'
        ];
        return $this->render('contact', $params);
    }


    public function contact(): string
    {
        $params = [
            'name' => 'Get in Touch'
        ];
        return $this->render('/contact', $params);
    }


    public function handleContact(): string
    {
        return 'Handling submitted data';
    }

}
