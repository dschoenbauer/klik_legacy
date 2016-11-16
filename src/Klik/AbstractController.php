<?php

namespace DSchoenbauer\Klik;

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Description of ControllerAbstract
 *
 * @author David
 */
abstract class AbstractController implements VisitorInterface {

    private $_app;

    public function visitApp(App $app) {
        $this->setApp($app)->getApp()->map($this->getMethods(),$this->getRoute(), [$this, 'handleRoute']);
    }

    public function handleRoute(Request $request, Response $response) {
        $this->render($request, $response);
        return $response;
    }

    abstract function getRoute();

    abstract function render(Request $request, Response $response);

    /**
     * @return App
     */
    public function getApp() {
        return $this->_app;
    }

    public function setApp($app) {
        $this->_app = $app;
        return $this;
    }

    public function getMethods() {
        return ['GET'];
    }

}
