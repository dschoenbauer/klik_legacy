<?php namespace DSchoenbauer\Klik\Pages;

use DSchoenbauer\Controller\AbstractController;
use DSchoenbauer\Klik\Component\Layout;
use DSchoenbauer\View\TemplatedView;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Description of Faq
 *
 * @author David
 */
class Faq extends AbstractController {

    public function getRoute() {
        return '/faq';
    }

    public function render(Request $request, Response $response) {
        $content = new TemplatedView('template/frequentlyAskedQuestions.html');
        $data = $this->getData()['faq'];
        $data['questions'] = $this->getQuestions($data['questions']);
        $response->getBody()->write((new Layout($request, $content->render($data)))->render($this->getData()));
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
