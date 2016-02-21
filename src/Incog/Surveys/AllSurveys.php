<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 09:00 PM
 */

namespace Incog\Surveys;

use Incog\Uuid;

interface AllSurveys
{
    /**
     * @return Uuid
     */
    public function nextIdentity();

    /**
     * @param Uuid $surveyId
     */
    public function surveyOfId(Uuid $surveyId);

    /**
     * @param Survey $survey
     */
    public function add(Survey $survey);
}
