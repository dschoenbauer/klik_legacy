<?php

use DSchoenbauer\Controller\AppDecorator;
use DSchoenbauer\Klik\Pages\About;
use DSchoenbauer\Klik\Pages\Faq;
use DSchoenbauer\Klik\Pages\Home;
use Slim\App;

require './vendor/autoload.php';
$app = new AppDecorator(new App);
$data = json_decode(file_get_contents('data/content.json'),true);
$app->accept(new Home($data));
$app->accept(new About($data));
$app->accept(new Faq($data));
$app->run();