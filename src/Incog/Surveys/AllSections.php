<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 10:26 PM
 */

namespace Incog\Surveys;

use Incog\Uuid;

interface AllSections
{
    /**
     * @return Uuid
     */
    public function nextIdentity();

    /**
     * @param Uuid $sectionId
     */
    public function sectionOfId(Uuid $sectionId);

    /**
     * @param Section $section
     */
    public function add(Section $section);
}
