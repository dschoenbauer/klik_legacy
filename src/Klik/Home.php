<?php namespace DSchoenbauer\Klik;

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
        try {
            $view = new TemplatedView('template\layout.html');
            $response->getBody()->write($view->render());
        } catch (\Exception $exc) {
            echo $exc->getTraceAsString();
        }

    }

}
