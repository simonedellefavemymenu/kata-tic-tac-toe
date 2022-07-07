<?php

namespace Kata;

class TicTacToe
{
    public function playerTakeFirstField(string $player, int $round): ?string
    {
        $field = null;

        if ($player === 'y') {
            $field = '1x2';
        }

        if ($player === 'x' && $round === 1) {
            $field = '1x1';
        }

        if ($player === 'x' && $round === 2) {
            $field = '1x3';
        }

        return $field;
    }
}
