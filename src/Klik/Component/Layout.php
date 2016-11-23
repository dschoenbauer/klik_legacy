<?php

namespace DSchoenbauer\Klik\Component;

use DSchoenbauer\View\TemplatedView;
use DSchoenbauer\View\ViewInterface;
use Exception;
use Slim\Http\Request;

/**
 * Description of Layout
 *
 * @author David
 */
class Layout implements ViewInterface {
    
    private $_request;
    private $_header = null;
    private $_content = null;
    private $_footer = null;
    
    public function __construct(Request $request, $content = null) {
        $this->setRequest($request)->setContent($content);
    }
    
    public function render(array $data = array(), $layout = 'template/layout.html') {
        try {
            $view = new TemplatedView($layout);

            $dataPage = [
                'header' => $this->getHeader($data),
                'content' => $this->getContent(),
                'footer' => $this->getFooter($data)
            ];
            return $view->render($dataPage);
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
    }
    /**
     * @return Request
     */
    public function getRequest() {
        return $this->_request;
    }

    public function setRequest($request) {
        $this->_request = $request;
        return $this;
    }
    public function getContent() {
        return $this->_content;
    }

    public function setContent($content) {
        $this->_content = $content;
        return $this;
    }


    public function getHeader($data) {
        if(!$this->_header){
            return (new Header($this->getRequest()))->render($data);
        }
        return $this->_header;
    }

    public function getFooter($data) {
        if(!$this->_footer){
            $templateLoader = new TemplatedView();
            return $templateLoader->setTemplate('template/footer.html')->render($data['project']);
        }
        return $this->_footer;
    }

    public function setHeader($header) {
        $this->_header = $header;
        return $this;
    }

    public function setFooter($footer) {
        $this->_footer = $footer;
        return $this;
    }
}
