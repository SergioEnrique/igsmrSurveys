<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 08:25 PM
 */

namespace Incog\Surveys;

use ArrayObject;

/**
 * @property Uuid         $surveyId
 * @property String       $title
 * @property String       $description
 * @property Organization $organization
 */
class SurveyView extends ArrayObject
{
    /**
     * @param array $survey
     */
    public function __construct(array $survey = [])
    {
        parent::__construct($survey);
        $this->setFlags(ArrayObject::ARRAY_AS_PROPS | ArrayObject::STD_PROP_LIST);
    }
}
