<?php

namespace Kata;

class Player
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function checkPlayer(): string
    {
        return $this->name;
    }
}
