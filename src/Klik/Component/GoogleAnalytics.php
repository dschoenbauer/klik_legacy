<?php

namespace DSchoenbauer\Klik\Component;

use DSchoenbauer\View\TemplatedView;
use DSchoenbauer\View\ViewInterface;

/**
 * Description of GoogleAnalytics
 *
 * @author David
 */
class GoogleAnalytics implements ViewInterface {

    public function render(array $data = array()) {
        $templateLoader = new TemplatedView();
        return $templateLoader->setTemplate('template/googleAnalytics.html')->render($data);
    }

}
