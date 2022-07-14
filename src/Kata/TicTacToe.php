<?php

namespace Kata;

class TicTacToe
{
    public function playerTakeMove(Player $player, array $field, int $round): array
    {
        if ($player->getIcon() === 'x') {
            if ($round === 1) {
                $field[0][0] = 'x';
            }

            if ($round === 2) {
                $field[0][2] = 'x';
            }

            return $field;
        }

        if ($round === 1) {
            $field[0][1] = 'o';
        }

        if ($round === 2) {
            $field[1][0] = 'o';
        }

        return $field;
    }
}
