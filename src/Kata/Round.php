<?php

namespace Kata;

class Round
{
    private int $round;

    public function __construct(int $round)
    {
        $this->round = $round;
    }

    public function getRound(): int
    {
        return $this->round;
    }
}
