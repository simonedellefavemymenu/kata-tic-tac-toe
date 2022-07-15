<?php

namespace Kata;

use Exception;

class PositionAlreadyTakenException extends Exception
{
    public function __construct()
    {
        parent::__construct("Position already token");
    }
}
