<?php

namespace Kata;

class TicTacToe
{
    protected int $round;

    public function playerTakeField(string $player, int $round): ?string
    {
        $field = null;

        if ($player === 'x' && $round === 1) {
            $field = '1x1';
        }

        if ($player === 'y' && $round === 1) {
            $field = '1x2';
        }

        if ($player === 'x' && $round === 2) {
            $field = '1x3';
        }

        if ($player === 'y' && $round === 2) {
            $field = '1x4';
        }

        if ($player === 'x' && $round === 3) {
            $field = '2x1';
        }

        if ($player === 'y' && $round === 3) {
            $field = '2x2';
        }

        return $field;
    }
}
