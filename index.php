<?php

use DSchoenbauer\Klik\AppDecorator;
use DSchoenbauer\Klik\Home;
use Slim\App;

require './vendor/autoload.php';

$app = new AppDecorator(new App);
$app->accept(new Home());
$app->run();