<?php

namespace Kata;

class Field
{
    protected int $abscissa;
    protected int $ordered;

    public function __construct(int $abscissa, int $ordered)
    {
        $this->abscissa = $abscissa;
        $this->ordered = $ordered;
    }

    public function getPosition(): string
    {
        return $this->abscissa . 'x' . $this->ordered;
    }

    public function getAbscissa(): int
    {
        return $this->abscissa;
    }

    public function getOrdered(): int
    {
        return $this->ordered;
    }
}
