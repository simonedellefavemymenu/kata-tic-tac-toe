<?php

namespace Kata;

class TicTacToe
{
    public function playerTakeField(string $player, Field $field): string
    {
        for ($round = 1; $round <= 9; $round++) {
            if ($player === 'x') {
                $position = $field->getPosition();
            }

            if ($player === 'y') {
                $position = $field->getPosition();
            }
        }

        return $position;
    }
}
