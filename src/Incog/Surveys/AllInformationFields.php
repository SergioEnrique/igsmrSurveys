<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 11:24 PM
 */

namespace Incog\Surveys;

use Incog\Uuid;

interface AllInformationFields
{
    /**
     * @return Uuid
     */
    public function nextIdentity();

    /**
     * @param Uuid $informationFieldId
     */
    public function informationFieldOfId(Uuid $informationFieldId);

    /**
     * @param InformationField $informationField
     */
    public function add(InformationField $informationField);
}
