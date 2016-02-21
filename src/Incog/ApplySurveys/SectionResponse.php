<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 10:42 PM
 */

namespace Incog\ApplySurveys;

use Incog\Surveys\Section;
use Incog\Surveys\SectionView;

class SectionResponse
{
    /** @var SectionView */
    public $section;

    /**
     * @param Section $section
     */
    public function __construct(Section $section)
    {
        $this->section = $section->render(new SectionView());
    }
}
