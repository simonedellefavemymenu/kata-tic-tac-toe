<?php

namespace Kata;

class TicTacToe
{
    public function playerTakeField(string $player, Field $field): array
    {
        $moves = [];

        for ($round = 1; $round <= 9; $round++) {
            if ($player === 'x') {
                $moves['x']['abscissa'][] = $field->getAbscissa();
                $moves['x']['ordered'][] = $field->getOrdered();
            }

            if ($player === 'y') {
                $moves['y']['abscissa'][] = $field->getAbscissa();
                $moves['y']['ordered'][] = $field->getOrdered();
            }
        }

        return $moves;
    }
}
