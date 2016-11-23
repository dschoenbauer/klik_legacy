<?php namespace DSchoenbauer\Klik;

use Slim\App;

/**
 *
 * @author David
 */
interface VisitorInterface {
    public function visitApp(App $app);
}
