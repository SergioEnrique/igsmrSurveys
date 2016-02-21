<?php

namespace Incog\ApplySurveys;

interface NewInformationFieldListener
{
    /**
     * @param InformationFieldResponse $response
     */
    public function whenInformationFieldIsAdded(InformationFieldResponse $response);
}
