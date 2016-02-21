<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 21/02/2016
 * Time: 12:44 AM
 */

namespace Incog\ApplySurveys;

use Incog\Surveys\Question;
use Incog\Surveys\QuestionView;

class QuestionResponse
{
    /** @var QuestionView */
    public $question;

    /**
     * @param Question $question
     */
    public function __construct(Question $question)
    {
        $this->question = $question->render(new QuestionView());
    }
}
