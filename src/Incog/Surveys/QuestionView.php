<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 21/02/2016
 * Time: 12:42 AM
 */

namespace Incog\Surveys;

use ArrayObject;

/**
 * @property Uuid    $questionId
 * @property String  $title
 * @property String  $weighing
 * @property Survey  $informationField
 * @property Section $section
 */
class QuestionView extends ArrayObject
{
    /**
     * @param array $question
     */
    public function __construct(array $question = [])
    {
        parent::__construct($question);
        $this->setFlags(ArrayObject::ARRAY_AS_PROPS | ArrayObject::STD_PROP_LIST);
    }
}
