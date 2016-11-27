<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DSchoenbauer\Klik\Pages;

use DSchoenbauer\Controller\AbstractController;
use DSchoenbauer\Klik\Component\Footer;
use DSchoenbauer\Klik\Component\GoogleAnalytics;
use DSchoenbauer\Klik\Component\Header;
use DSchoenbauer\Klik\Component\Layout;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Description of KlikController
 *
 * @author David
 */
abstract class KlikController extends AbstractController {

    private $_request;
    private $_response;
    private $_layout;


    public function __construct(array $data = array(), Layout $layout = null) {
        parent::__construct($data);
        if($layout === null){
            $this->setLayout(New Layout('template/layout.html'));
        }
    }
    
    public function buildPage(){
        $this->getLayout()->add('title', $this->getData()->get('project.name'));
        $this->getLayout()->add('header', (new Header($this->getRequest()))->render($this->getData()->getData()));
        $this->getLayout()->add('ga', (new GoogleAnalytics())->render($this->getData()->get('project')));
        $this->getLayout()->add('footer', (new Footer())->render($this->getData()->get('project')));
    }

    public function render(Request $request, Response $response) {
        $this->setRequest($request)->setResponse($response);
        $this->buildPage();
        $response->getBody()->write($this->getLayout()->render($this->getData()->getData()));
    }

    public function getRequest() {
        return $this->_request;
    }

    public function getResponse() {
        return $this->_response;
    }

    public function setRequest($request) {
        $this->_request = $request;
        return $this;
    }

    public function setResponse($response) {
        $this->_response = $response;
        return $this;
    }
    
    /**
     * @return Layout
     */
    public function getLayout() {
        return $this->_layout;
    }

    public function setLayout($layout) {
        $this->_layout = $layout;
        return $this;
    }

    public function getGa() {
        
    }

}