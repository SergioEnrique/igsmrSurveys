<?php

namespace Incog\ApplySurveys;

use Incog\Surveys\AllInformationFields;
use Incog\Surveys\AllQuestions;
use Incog\Surveys\AllSections;
use Incog\Surveys\Question;

class NewQuestion
{
    /** @type AllInformationFields */
    public $allInformationField;

    /** @type AllSections */
    public $allSections;

    /** @type AllQuestions  */
    public $allQuestions;

    /** @type NewQuestionListener */
    public $questionListener;

    /**
     * @param AllInformationFields $allInformationFields
     * @param AllSections $allSections
     * @param AllQuestions $allQuestions
     */
    public function __construct(
        AllInformationFields $allInformationFields,
        AllSections $allSections,
        AllQuestions $allQuestions
    )
    {
        $this->allInformationField = $allInformationFields;
        $this->allSections = $allSections;
        $this->allQuestions = $allQuestions;
    }

    /**
     * @param NewQuestionListener $listener
     */
    public function attach(NewQuestionListener $listener)
    {
        $this->questionListener = $listener;
    }

    /**
     * @param QuestionRequest $request
     */
    public function newQuestion(QuestionRequest $request)
    {
        $informationField = $this->allInformationField->informationFieldOfId($request->informationFieldId);
        if (!$informationField) {
            $this->questionListener->whenInformationFieldNotFound($request);

            return;
        }

        $section = $this->allSections->sectionOfId($request->sectionId);
        if (!$section) {
            $this->questionListener->whenSectionNotFound($request);

            return;
        }

        $question = new Question(
            $this->allQuestions->nextIdentity(),
            $request->title,
            $request->weighing,
            $informationField,
            $section
        );

        $this->allQuestions->add($question);

        $this->questionListener->whenQuestionIsAdded(new QuestionResponse($question));
    }

}
