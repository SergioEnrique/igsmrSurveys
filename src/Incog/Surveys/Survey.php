<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 08:14 PM
 */

namespace Incog\Surveys;

use Incog\Uuid;

class Survey {

    /** @type Uuid */
    protected $surveyId;

    /** @type String */
    protected $title;

    /** @type String */
    protected $description;

    /** @type Organization */
    protected $organization;

    public function __construct(
        Uuid $surveyId,
        $title,
        $description,
        Organization $organization
    )
    {
        $this->surveyId = $surveyId;
        $this->title = $title;
        $this->description = $description;
        $this->organization = $organization;
    }

    /**
     * @param SurveyView $view
     */
    public function render(SurveyView $view){
        $view->surveyId = $this->surveyId->id();
        $view->title = $this->title;
        $view->description = $this->description;
    }
}
