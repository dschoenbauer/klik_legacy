<?php

namespace DSchoenbauer\Klik\Pages;

use DSchoenbauer\View\TemplatedView;

/**
 * Description of Faq
 *
 * @author David
 */
class Faq extends KlikController {

    public function getRoute() {
        return '/faq';
    }

    public function buildPage() {
        parent::buildPage();
        $content = new TemplatedView('template/frequentlyAskedQuestions.html');
        $data = $this->getData()->get('faq');
        $data['questions'] = $this->getQuestions($this->getData()->get('faq.questions',[]));
        $this->getLayout()->add('content', $content->render($data));
    }

    public function getQuestions($questions) {
        $output = "";
        $render = new TemplatedView('template/frequentlyAskedQuestion.html');
        foreach ($questions as $key => $question) {
            $question['id'] = str_repeat("A", $key);
            $output .= $render->render($question);
        }
        return $output;
    }

}
