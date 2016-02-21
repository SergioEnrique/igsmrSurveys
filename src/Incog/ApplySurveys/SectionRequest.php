<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 10:39 PM
 */

namespace Incog\ApplySurveys;

use ArrayObject;
use Incog\Uuid;

class SectionRequest extends ArrayObject
{
    /**
     * @param array $section
     */
    public function __construct(array $section)
    {
        $this->setFlags(ArrayObject::STD_PROP_LIST | ArrayObject::ARRAY_AS_PROPS);
        isset($section['sectionId']) && $this->offsetSet('sectionId', new Uuid($section['sectionId']));
        isset($section['title']) && $this->offsetSet('title', $section['title']);
        isset($section['surveyId']) && $this->offsetSet('surveyId', new Uuid($section['surveyId']));
    }
}
