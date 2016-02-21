<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 08:48 PM
 */

namespace Incog\ApplySurveys;

use Incog\Surveys\Survey;
use Incog\Surveys\SurveyView;

class SurveyResponse
{
    /** @type SurveyView */
    public $survey;

    /**
     * @param Survey $survey
     */
    public function __construct(Survey $survey)
    {
        $this->survey = $survey->render(new SurveyView());
    }
}
