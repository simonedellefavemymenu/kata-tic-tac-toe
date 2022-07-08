<?php

namespace Kata;

class TicTacToe
{
    public function playerTakeField(Player $player, Field $field): array
    {
        $moves = [];

        if ($player->checkPlayer() === 'x') {
            $moves['x']['abscissa'][] = $field->getAbscissa();
            $moves['x']['ordered'][] = $field->getOrdered();
        }

        if ($player->checkPlayer() === 'y') {
            $moves['y']['abscissa'][] = $field->getAbscissa();
            $moves['y']['ordered'][] = $field->getOrdered();
        }

        return $moves;
    }
}
