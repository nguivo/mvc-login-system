<?php

use app\core\Application;

require_once dirname(__DIR__). "/vendor/autoload.php";

$app = new Application();

$app->router->get('/', function(){
    return 'Hello world';
});

$app->router->get('/home', 'home');
$app->router->get('/contact', function (){
    return 'contact';
});

$app->run();
