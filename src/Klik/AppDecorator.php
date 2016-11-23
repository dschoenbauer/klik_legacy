<?php

namespace DSchoenbauer\Klik;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

/**
 * Description of AppDecorator
 *
 * @author David
 */
class AppDecorator implements VisiteeInterface {

    private $_app;

    public function __construct(App $app) {
        $this->setApp($app);
    }

    public function __call($method, $args) {
        return $this->getApp()->__call($method, $args);
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response) {
        return $this->getApp()->__invoke($request, $response);
    }

    public function add($callable) {
        return $this->getApp()->add($callable);
    }

    public function any($pattern, $callable) {
        return $this->getApp()->any($pattern, $callable);
    }

    public function delete($pattern, $callable) {
        return $this->getApp()->delete($pattern, $callable);
    }

    public function get($pattern, $callable) {
        return $this->getApp()->get($pattern, $callable);
    }

    public function getContainer() {
        return $this->getApp()->getContainer();
    }

    public function group($pattern, $callable) {
        return $this->getApp()->group($pattern, $callable);
    }

    public function map($methods, $pattern, $callable) {
        return $this->getApp()->map($methods, $pattern, $callable);
    }

    public function options($pattern, $callable) {
        return $this->getApp()->options($pattern, $callable);
    }

    public function patch($pattern, $callable) {
        return $this->getApp()->patch($pattern, $callable);
    }

    public function post($pattern, $callable) {
        return $this->getApp()->post($pattern, $callable);
    }

    public function process(ServerRequestInterface $request, ResponseInterface $response) {
        return $this->getApp()->process($request, $response);
    }

    public function put($pattern, $callable) {
        return $this->getApp()->put($pattern, $callable);
    }

    public function respond(ResponseInterface $response) {
        $this->getApp()->respond($response);
    }

    public function run($silent = false) {
        return $this->getApp()->run($silent);
    }

    public function subRequest($method, $path, $query = '', array $headers = array(), array $cookies = array(), $bodyContent = '', ResponseInterface $response = null) {
        return $this->getApp()->subRequest($method, $path, $query, $headers, $cookies, $bodyContent, $response);
    }

    public function callMiddlewareStack(ServerRequestInterface $req, ResponseInterface $res) {
        return $this->getApp()->callMiddlewareStack($req, $res);
    }

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

    public function accept(VisitorInterface $visitor) {
        $visitor->visitApp($this->getApp());
    }

}
