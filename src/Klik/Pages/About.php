<?php

namespace DSchoenbauer\Klik\Pages;

use DSchoenbauer\Controller\AbstractController;
use DSchoenbauer\Klik\Component\Layout;
use DSchoenbauer\View\TemplatedView;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Description of About
 *
 * @author David
 */
class About extends AbstractController {

    public function getRoute() {
        return '/about';
    }

    public function render(Request $request, Response $response) {
        $content = new TemplatedView('template/about.html');
        $response->getBody()->write((new Layout($request, $content->render()))->render($this->getData()));
    }

}