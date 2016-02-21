<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 11:27 PM
 */

namespace Incog\ApplySurveys;

use Incog\Surveys\InformationField;
use Incog\Surveys\InformationFieldView;

class InformationFieldResponse
{
    /** @var InformationFieldView */
    public $informationField;

    /**
     * @param InformationField $informationField
     */
    public function __construct(InformationField $informationField)
    {
        $this->informationField = $informationField->render(new InformationFieldView());
    }
}
