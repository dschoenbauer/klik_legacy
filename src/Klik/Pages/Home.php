<?php namespace DSchoenbauer\Klik\Pages;

use DSchoenbauer\Controller\AbstractController;
use DSchoenbauer\Klik\Component\Layout;
use DSchoenbauer\View\TemplatedView;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Description of Home
 *
 * @author David
 */
class Home extends AbstractController{
    
    public function getRoute() {
        return "/";
    }

    public function render(Request $request, Response $response) {
        $contentTemplate = new TemplatedView('template/home.html');        
        $layout = new Layout($request);
        $layout->setHeader($contentTemplate->render());
        $response->getBody()->write($layout->render($this->getData()));
    }

}
