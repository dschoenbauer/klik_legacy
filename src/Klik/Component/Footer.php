<?php namespace DSchoenbauer\Klik\Component;

use DSchoenbauer\View\TemplatedView;
use DSchoenbauer\View\ViewInterface;

/**
 * Description of Footer
 *
 * @author David
 */
class Footer implements ViewInterface {

    public function render(array $data = array()) {
        $templateLoader = new TemplatedView();
        return $templateLoader->setTemplate('template/footer.html')->render($data);
    }

}
