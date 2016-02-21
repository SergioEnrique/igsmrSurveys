<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 09:30 PM
 */

namespace Incog\Surveys;

use Incog\Uuid;

class Organization
{
    /** @type Uuid */
    protected $organizationId;

    /** @type string */
    protected $name;

    /** @User */
    protected $user;

    /**
     * @param Uuid $organizationId
     * @param $name
     * @param User $user
     */
    public function __construct(
        Uuid $organizationId,
        $name,
        User $user
    )
    {
        $this->organizationId = $organizationId;
        $this->name = $name;
        $this->user = $user;
    }
}
