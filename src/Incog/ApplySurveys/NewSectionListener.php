<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 10:44 PM
 */

namespace Incog\ApplySurveys;


interface NewSectionListener
{
    /**
     * @param SectionRequest $request
     */
    public function whenSurveyNotFound(SectionRequest $request);

    /**
     * @param SectionResponse $response
     */
    public function whenSectionIsAdded(SectionResponse $response);
}
