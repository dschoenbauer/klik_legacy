<?php

namespace DSchoenbauer\Klik\Component;

use DSchoenbauer\View\TemplatedView;
use DSchoenbauer\View\ViewInterface;
use Exception;

/**
 * Description of Layout
 *
 * @author David
 */
class Layout implements ViewInterface {

    private $_pageComponents = [];
    private $_pageTemplate;
    
    public function __construct($pageTemplate) {
        $this->setPageTemplate($pageTemplate);
    }

    public function render(array $data = array()) {
        try {
            $view = new TemplatedView($this->getPageTemplate());
            return $view->render(array_merge($this->_pageComponents, $data));
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }

    public function add($key, $content) {
        $this->_pageComponents[$key] = $content;
    }

    public function getPageComponents() {
        return $this->_pageComponents;
    }

    public function getPageTemplate() {
        return $this->_pageTemplate;
    }

    public function setPageComponents($pageComponents) {
        $this->_pageComponents = $pageComponents;
        return $this;
    }

    public function setPageTemplate($pageTemplate) {
        $this->_pageTemplate = $pageTemplate;
        return $this;
    }
}
