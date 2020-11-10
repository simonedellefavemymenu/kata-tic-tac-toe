<?php

namespace Kata;

use Kata\Exceptions\TicTacToeException;

class TicTacToeInvalidMove extends TicTacToeResult
{
    public function __construct(TicTacToeException $e, string $message)
    {
        parent::__construct($e->getMessage(), false);
    }
}