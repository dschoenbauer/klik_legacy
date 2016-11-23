<?php

namespace DSchoenbauer\Klik;

use DSchoenbauer\View\TemplatedView;
use DSchoenbauer\View\ViewInterface;
use Slim\Http\Request;

/**
 * Description of Header
 *
 * @author David
 */
class Header implements ViewInterface {

    private $_currentUrl;
    private $_request;

    public function __construct(Request $request) {
        $this->setRequest($request);
    }    
    

    public function render(array $data = array()) {
        /* @var $test \Slim\Route */
        $templateView = new TemplatedView();
        $data['project']['menuItems'] = $this->getMenuItems($templateView, $data['project']['routes']);
        $header = $templateView->setTemplate('template/header.html')->render($data['project']);
//Menu Items
        return $header;
    }

    private function getMenuItems(TemplatedView $templateView, $routes) {
        $templateView->setTemplate('template/menuItem.html');
        $routeO = $this->getRequest()->getAttribute('route');
        $pattern  = $routeO->getPattern();

        $menuItems = "";
        foreach ($routes as $route) {

            $route['class'] = (trim($route['url'],".") === trim($pattern,"/.")) ? "active" : "inactive";
            $menuItems .= $templateView->render($route);
        }
        return $menuItems;
    }

    /**
     * @return Request
     */
    public function getRequest() {
        return $this->_request;
    }

    public function setRequest(Request $request) {
        $this->_request = $request;
        return $this;
    }


}
