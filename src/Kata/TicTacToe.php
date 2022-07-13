<?php

namespace Kata;

class TicTacToe
{
    public function playerTakeMove(string $player): array
    {
        $field = [
            0 => [$player], [], [],
            1 => [], [], [],
            2 => [], [], []
        ];

        return $field;
    }
}
