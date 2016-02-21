<?php

namespace Incog\ApplySurveys;

use Incog\Surveys\AllSections;
use Incog\Surveys\AllSurveys;
use Incog\Surveys\Section;

class NewSection
{
    /** @type AllSurveys */
    public $allSurveys;

    /** @type AllSections */
    public $allSections;

    /** @type NewSectionListener */
    public $sectionListener;

    /**
     * @param AllSurveys $allSurveys
     * @param AllSections $allSections
     */
    public function __construct(
        AllSurveys $allSurveys,
        AllSections $allSections
    )
    {
        $this->allSurveys = $allSurveys;
        $this->allSections = $allSections;
    }

    /**
     * @param NewSectionListener $listener
     */
    public function attach(NewSectionListener $listener)
    {
        $this->sectionListener = $listener;
    }

    /**
     * @param SectionRequest $request
     */
    public function newSection(SectionRequest $request)
    {
        $survey = $this->allSurveys->surveyOfId($request->surveyId);
        if (!$survey) {
            $this->sectionListener->whenSurveyNotFound($request);

            return;
        }

        $section = new Section(
            $this->allSections->nextIdentity(),
            $request->title,
            $survey
        );

        $this->allSections->add($section);

        $this->sectionListener->whenSectionIsAdded(new SectionResponse($section));
    }
}
