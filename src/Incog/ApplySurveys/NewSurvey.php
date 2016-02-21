<?php

namespace Incog\ApplySurveys;

use Incog\Surveys\AllOrganizations;
use Incog\Surveys\AllSurveys;
use Incog\Surveys\Survey;

class NewSurvey
{
    /** @type AllOrganizations */
    public $allOrganizations;

    /** @type AllSurveys */
    public $allSurveys;

    /** @type NewSurveyListener */
    public $surveyListener;

    /**
     * @param AllOrganizations $allOrganizations
     * @param AllSurveys       $allSurveys
     */
    public function __construct(
        AllOrganizations $allOrganizations,
        AllSurveys $allSurveys
    )
    {
        $this->allOrganizations = $allOrganizations;
        $this->allSurveys = $allSurveys;
    }

    /**
     * @param NewSurveyListener $listener
     */
    public function attach(NewSurveyListener $listener)
    {
        $this->surveyListener = $listener;
    }

    /**
     * @param SurveyRequest $request
     */
    public function newSurvey(SurveyRequest $request)
    {
        $organization = $this->allOrganizations->organizationOfId($request->organizationId);

        if (!$organization) {
            $this->surveyListener->whenOrganizationNotFound($request);

            return;
        }

        $survey = new Survey(
            $this->allSurveys->nextIdentity(),
            $request->title,
            $request->description,
            $organization
        );

        $this->allSurveys->add($survey);

        $this->surveyListener->whenSurveyIsAdded(new SurveyResponse($survey));
    }

}
