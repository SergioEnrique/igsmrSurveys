<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 21/02/2016
 * Time: 12:45 AM
 */

namespace Incog\ApplySurveys;

interface NewQuestionListener
{
    /**
     * @param QuestionRequest $request
     */
    public function whenInformationFieldNotFound(QuestionRequest $request);

    /**
     * @param QuestionRequest $request
     */
    public function whenSectionNotFound(QuestionRequest $request);

    /**
     * @param QuestionResponse $response
     */
    public function whenQuestionIsAdded(QuestionResponse $response);
}
