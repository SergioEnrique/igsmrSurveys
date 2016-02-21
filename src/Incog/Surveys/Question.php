<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 21/02/2016
 * Time: 12:33 AM
 */

namespace Incog\Surveys;

use Incog\Uuid;

class Question
{
    /** @type Uuid */
    protected $questionId;

    /** @type String */
    protected $title;

    /** @type String */
    protected $weighing;

    /** @type InformationField */
    protected $informationField;

    /** @type Section */
    protected $section;

    /**
     * @param Uuid $questionId
     * @param $title
     * @param $weighing
     * @param InformationField $informationField
     * @param Section $section
     */
    public function __construct(
        Uuid $questionId,
        $title,
        $weighing,
        InformationField $informationField,
        Section $section
    )
    {
        $this->questionId = $questionId;
        $this->title = $title;
        $this->weighing = $weighing;
        $this->informationField = $informationField;
        $this->section = $section;
    }

    /**
     * @param QuestionView $view
     */
    public function render(QuestionView $view)
    {
        $view->questionId = $this->questionId->id();
        $view->title = $this->title;
        $view->weighing = $this->weighing;
        $view->informationField = $this->informationField;
        $view->section = $this->section;
    }
}
