<?php

namespace Kata;

abstract class TicTacToeResult
{
    private $message;
    private $success;

    public function __construct(string $message, bool $success)
    {
        $this->message = $message;
        $this->success = $success;
    }

    public function message(): string
    {
        return $this->message;
    }

    public function success(): bool
    {
        return $this->success;
    }

}