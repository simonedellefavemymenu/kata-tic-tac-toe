<?php

namespace Kata;

class TicTacToe
{
    public function playerTakeMove(Player $player, Field $field, Round $round, Coordinates $coordinates): Field
    {
        if ($player->getIcon() === 'x') {
            if ($round->getRound() === 1) {
                $field->putIconIntoField('x', 0, 0);
            }

            if ($round->getRound() === 2) {
                $field->putIconIntoField('x', 0, 2);
            }

            return $field;
        }

        if ($round->getRound() === 1) {
            $field->putIconIntoField('o', 0, 1);
        }

        if ($round->getRound() === 2) {
            $field->putIconIntoField('o', 1, 0);
        }

        return $field;
    }
}
