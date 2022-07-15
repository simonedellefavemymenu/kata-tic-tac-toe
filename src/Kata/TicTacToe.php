<?php

namespace Kata;

class TicTacToe
{
    public function playerTakeMove(Player $player, Field $field, Round $round, Coordinates $coordinates): Field
    {
        if ($round->getRound() === 1) {
            $field->putIconIntoField($player->getIcon(), $coordinates->getRow(), $coordinates->getColumn());
        }
        if ($round->getRound() === 2) {
            $field->putIconIntoField($player->getIcon(), $coordinates->getRow(), $coordinates->getColumn());
        }
        
        return $field;
    }
}
