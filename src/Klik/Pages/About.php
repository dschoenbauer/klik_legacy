<?php

namespace DSchoenbauer\Klik\Pages;

use DSchoenbauer\View\TemplatedView;

/**
 * Description of About
 *
 * @author David
 */
class About extends KlikController {

    public function getRoute() {
        return '/about';
    }

    public function buildPage() {
        parent::buildPage();
        $content = new TemplatedView('template/about.html');
        $data = array_merge(
                $this->getData()['about'],
                $this->getData()['about']['address'],
                $this->getData()['project']
                );
        $this->getLayout()->add('content', $content->render($data));
    }


}
