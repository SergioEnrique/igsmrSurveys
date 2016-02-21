<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 10:27 PM
 */

namespace Incog\Surveys;

use Incog\Uuid;

class Section
{
    /** @type Uuid */
    protected $sectionId;

    /** @type String */
    protected $title;

    /** @type Survey */
    protected $survey;

    /**
     * @param Uuid $sectionId
     * @param $title
     * @param Survey $survey
     */
    public function __construct(
        Uuid $sectionId,
        $title,
        Survey $survey
    )
    {
        $this->sectionId = $sectionId;
        $this->title = $title;
        $this->survey = $survey;
    }

    public function render(SectionView $view)
    {
        $view->sectionId = $this->sectionId->id();
        $view->title = $this->title;
        $view->survey = $this->survey;
    }
}
