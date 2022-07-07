<?php

namespace Kata;

class TicTacToe
{
    public function playerTakeField(string $player, int $round, string $position): string
    {
        $fieldClass = new Field($position);

        if ($player === 'x' && $round === 1) {
            $field = $fieldClass->getPosition();
        }

        if ($player === 'x' && $round === 2) {
            $field = $fieldClass->getPosition();
        }

        if ($player === 'x' && $round === 3) {
            $field = $fieldClass->getPosition();
        }

        if ($player === 'x' && $round === 9) {
            $field = $fieldClass->getPosition();
        }

        if ($player === 'y' && $round === 1) {
            $field = $fieldClass->getPosition();
        }

        if ($player === 'y' && $round === 2) {
            $field = $fieldClass->getPosition();
        }

        if ($player === 'y' && $round === 3) {
            $field = $fieldClass->getPosition();
        }

        if ($player === 'y' && $round === 9) {
            $field = $fieldClass->getPosition();
        }

        return $position;
    }
}
