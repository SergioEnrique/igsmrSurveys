<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 08:53 PM
 */

namespace Incog\ApplySurveys;

interface NewSurveyListener
{
    /**
     * @param SurveyRequest $request
     */
    public function whenOrganizationNotFound(SurveyRequest $request);

    /**
     * @param SurveyResponse $response
     */
    public function whenSurveyIsAdded(SurveyResponse $response);
}
