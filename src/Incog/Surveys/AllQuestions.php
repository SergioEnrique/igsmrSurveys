<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 21/02/2016
 * Time: 12:43 AM
 */

namespace Incog\Surveys;

use Incog\Uuid;

interface AllQuestions
{
    /**
     * @return Uuid
     */
    public function nextIdentity();

    /**
     * @param Question $question
     */
    public function add(Question $question);
}
