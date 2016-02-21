<?php

namespace Incog\ApplySurveys;

use Incog\Surveys\AllInformationFields;
use Incog\Surveys\InformationField;

class NewInformationField
{

    /** @var AllInformationFields */
    public $allInformationFields;

    /** @type NewInformationFieldListener */
    public $informationFieldListener;

    /**
     * @param AllInformationFields $allInformationFields
     */
    public function __construct(AllInformationFields $allInformationFields)
    {
        $this->allInformationFields = $allInformationFields;
    }

    /**
     * @param NewInformationFieldListener $listener
     */
    public function attach(NewInformationFieldListener $listener)
    {
        $this->informationFieldListener = $listener;
    }

    /**
     * @param InformationFieldRequest $request
     */
    public function newInformationField(InformationFieldRequest $request)
    {
        $informationField = new InformationField(
            $this->allInformationFields->nextIdentity(),
            $request->name
        );

        $this->allInformationFields->add($informationField);

        $this->informationFieldListener->whenInformationFieldIsAdded(new InformationFieldResponse($informationField));
    }


}
