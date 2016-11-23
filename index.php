<?php

use DSchoenbauer\Klik\About;
use DSchoenbauer\Klik\AppDecorator;
use DSchoenbauer\Klik\Faq;
use DSchoenbauer\Klik\Home;
use Slim\App;

require './vendor/autoload.php';
$app = new AppDecorator(new App);
$data = json_decode(file_get_contents('data/content.json'),true);
$app->accept(new Home($data));
$app->accept(new About($data));
$app->accept(new Faq($data));
$app->run();