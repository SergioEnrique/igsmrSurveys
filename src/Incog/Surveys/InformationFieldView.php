<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 11:22 PM
 */

namespace Incog\Surveys;

use ArrayObject;

/**
 * @property Uuid   $informationFieldId
 * @property String $name
 */
class InformationFieldView extends ArrayObject
{
    /**
     * @param array $informationField
     */
    public function __construct(array $informationField = [])
    {
        parent::__construct($informationField);
        $this->setFlags(ArrayObject::ARRAY_AS_PROPS | ArrayObject::STD_PROP_LIST);
    }
}
