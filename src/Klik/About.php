<?php

namespace DSchoenbauer\Klik;

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
        $content = new \DSchoenbauer\View\TemplatedView('template/about.html');
        $response->getBody()->write((new Layout($request, $content->render()))->render($this->getData()));
    }

}
