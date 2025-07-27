<?php

use app\controllers\SiteController;
use app\core\Application;

require_once dirname(__DIR__). "/vendor/autoload.php";

$app = new Application(dirname(__DIR__));

$app->router->get('/', 'home');
$app->router->get('/home', 'home');
$app->router->get('/contact', 'contact');
$app->router->post('/contact', [SiteController::class, 'handleContact']);

$app->router->get('/about', function(){
    return 'Hello world from about us';
});
/*$app->router->post('/contact', function (){return 'handling submitted data';});*/

$app->run();
