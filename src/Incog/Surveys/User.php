<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 09:38 PM
 */

namespace Incog\Surveys;

use Incog\Uuid;

class User
{
    /** @type Uuid */
    protected $userId;

    /** @type string */
    protected $userName;

    /** @string */
    protected $email;

    /**
     * @param Uuid $userId
     * @param $userName
     * @param $email
     */
    public function __construct(
        Uuid $userId,
        $userName,
        $email
    )
    {
        $this->$userId = $userId;
        $this->userName = $userName;
        $this->email = $email;
    }
}
