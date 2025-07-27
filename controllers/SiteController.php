<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

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


    public function handleContact(Request $request): string
    {
        $body = $request->getBody();
        return 'Handling submitted data';
    }

}
