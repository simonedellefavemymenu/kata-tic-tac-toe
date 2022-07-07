<?php

namespace Kata;

class Field
{
    protected string $position;

    public function __construct(string $position)
    {
        $this->position = $position;
    }

    public function getPosition(): string
    {
        return $this->position;
    }
}
