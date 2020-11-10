<?php

namespace Kata\Exceptions;

use Kata\FieldOffset;

class FieldOffTheGridException extends TicTacToeException {
    public function __construct(FieldOffset $fieldOffset)
    {
        parent::__construct("Field $fieldOffset is off the grid limits", 500);
    }
}