<?php

namespace Kata\Exceptions;

use Kata\FieldOffset;

class AlreadyTakenFieldException extends TicTacToeException {
    public function __construct(FieldOffset $fieldOffset)
    {
        parent::__construct("Field $fieldOffset is already taken", 500);
    }
}