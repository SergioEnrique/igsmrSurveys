<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 11:20 PM
 */

namespace Incog\Surveys;

use Incog\Uuid;

class InformationField
{
    /** @type Uuid */
    protected $informationFieldId;

    /** @type String */
    protected $name;

    /**
     * @param Uuid $informationFieldId
     * @param $name
     */
    public function __construct(
        Uuid $informationFieldId,
        $name
    )
    {
        $this->informationFieldId = $informationFieldId;
        $this->name = $name;
    }

    /**
     * @param InformationFieldView $view
     */
    public function render(InformationFieldView $view)
    {
        $view->informationFieldId = $this->informationFieldId->id();
        $view->name = $this->name;
    }
}
