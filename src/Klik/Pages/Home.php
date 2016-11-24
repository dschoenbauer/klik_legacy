<?php

namespace DSchoenbauer\Klik\Pages;

use DSchoenbauer\View\TemplatedView;

/**
 * Description of Home
 *
 * @author David
 */
class Home extends KlikController {

    public function getRoute() {
        return "/";
    }

    public function buildPage() {
        parent::buildPage();
        $contentTemplate = new TemplatedView('template/home.html');
        $this->getLayout()->add('header', $contentTemplate->render());
        $this->getLayout()->add('content', null);
    }

}
