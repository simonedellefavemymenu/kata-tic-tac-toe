<?php

namespace Kata;

use Exception;

class PositionAlreadyTokenException extends Exception
{
    public function __construct()
    {
        parent::__construct("Position already token");
    }
}
