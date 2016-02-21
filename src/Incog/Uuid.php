<?php
/**
 * Created by PhpStorm.
 * User: MichMendar
 * Date: 20/02/2016
 * Time: 08:30 PM
 */

namespace Incog;

class Uuid {

    /** @type string */
    protected $id;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /** @return string */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->id;
    }
}
