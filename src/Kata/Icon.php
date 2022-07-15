<?php

namespace Kata;

class Player
{
    private string $icon;

    public function __construct(string $icon)
    {
        $this->icon = $icon;
    }

    public function getIcon(): string
    {
        return $this->icon;
    }
}
