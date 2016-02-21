<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 10:33 PM
 */

namespace Incog\Surveys;

use ArrayObject;

/**
 * @property Uuid   $sectionId
 * @property String $title
 * @property Survey $survey;
 */
class SectionView extends ArrayObject
{
    /**
     * @param array $section
     */
    public function __construct(array $section = [])
    {
        parent::__construct($section);
        $this->setFlags(ArrayObject::ARRAY_AS_PROPS | ArrayObject::STD_PROP_LIST);
    }
}
