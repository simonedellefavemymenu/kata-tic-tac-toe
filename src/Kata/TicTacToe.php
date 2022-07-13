<?php

namespace Kata;

class TicTacToe
{
    public function playerTakeMove(string $player, array $field): array
    {
        if ($player === 'x') {
            $field[0][0] = 'x';

            return $field;
        }

        $field[0][1] = 'o';

        return $field;
    }
}
