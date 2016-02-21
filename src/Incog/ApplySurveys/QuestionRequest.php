<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 21/02/2016
 * Time: 12:44 AM
 */

namespace Incog\ApplySurveys;

use ArrayObject;
use Incog\Uuid;

class QuestionRequest extends ArrayObject
{
    /**
     * @param array $question
     */
    public function __construct(array $question)
    {
        $this->setFlags(ArrayObject::STD_PROP_LIST | ArrayObject::ARRAY_AS_PROPS);
        isset($question['questionId']) && $this->offsetSet('questionId', new Uuid($question['questionId']));
        isset($question['title']) && $this->offsetSet('title', $question['title']);
        isset($question['weighing']) && $this->offsetSet('weighing', new Uuid($question['weighing']));
        isset($question['informationFieldId']) && $this->offsetSet(
            'informationFieldId', new Uuid($question['informationFieldId'])
        );
        isset($question['sectionId']) && $this->offsetSet('sectionId', new Uuid($question['sectionId']));
    }
}
