<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 08:59 PM
 */

namespace Incog\Surveys;

use Incog\Uuid;

interface AllOrganizations {

    /**
     * @return Uuid
     */
    public function nextIdentity();

    /**
     * @param Uuid $organizationId
     */
    public function organizationOfId(Uuid $organizationId);
}
