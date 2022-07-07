<?php

namespace Kata;

class TicTacToe
{
    public function playerTakeField(string $player, int $round, Field $field): string
    {
        if ($player === 'x' && $round === 1) {
            $position = $field->getPosition();
        }

        if ($player === 'x' && $round === 2) {
            $position = $field->getPosition();
        }

        if ($player === 'x' && $round === 3) {
            $position = $field->getPosition();
        }

        if ($player === 'x' && $round === 9) {
            $position = $field->getPosition();
        }

        if ($player === 'y' && $round === 1) {
            $position = $field->getPosition();
        }

        if ($player === 'y' && $round === 2) {
            $position = $field->getPosition();
        }

        if ($player === 'y' && $round === 3) {
            $position = $field->getPosition();
        }

        if ($player === 'y' && $round === 9) {
            $position = $field->getPosition();
        }

        return $position;
    }
}
