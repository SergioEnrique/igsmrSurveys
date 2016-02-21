<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 08:40 PM
 */

namespace Incog\ApplySurveys;

use ArrayObject;
use Incog\Uuid;

class SurveyRequest extends ArrayObject
{
    /**
     * @param array $survey
     */
    public function __construct(array $survey)
    {
        $this->setFlags(ArrayObject::STD_PROP_LIST | ArrayObject::ARRAY_AS_PROPS);
        isset($survey['surveyId']) && $this->offsetSet('surveyId', new Uuid($survey['surveyId']));
        isset($survey['title']) && $this->offsetSet('title', $survey['title']);
        isset($survey['description']) && $this->offsetSet('description', $survey['description']);
        isset($survey['organizationId']) && $this->offsetSet('organizationId', new Uuid($survey['organizationId']));
    }
}
