<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 11:25 PM
 */

namespace Incog\ApplySurveys;

use ArrayObject;
use Incog\Uuid;

class InformationFieldRequest extends ArrayObject
{
    /**
     * @param array $informationField
     */
    public function __construct(array $informationField)
    {
        $this->setFlags(ArrayObject::STD_PROP_LIST | ArrayObject::ARRAY_AS_PROPS);
        isset($informationField['informationFieldId']) && $this->offsetSet(
            'informationFieldId', new Uuid($informationField['informationFieldId'])
        );
        isset($informationField['name']) && $this->offsetSet('name', $informationField['name']);
    }
}
