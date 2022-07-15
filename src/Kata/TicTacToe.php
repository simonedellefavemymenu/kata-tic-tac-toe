<?php

namespace Kata;

class TicTacToe
{
    /**
     * @throws PositionAlreadyTokenException
     */
    public function playerTakeMove(Player $player, Field $field, Coordinates $coordinates): Field
    {
        $field->putIconIntoField($player->getIcon(), $coordinates->getRow(), $coordinates->getColumn());
        return $field;
    }
}
