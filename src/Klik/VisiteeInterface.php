<?php namespace DSchoenbauer\Klik;

/**
 * Description of VisiteeInterface
 *
 * @author David
 */
interface VisiteeInterface {
    public function accept(VisitorInterface $visitor);
}
