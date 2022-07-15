<?php

namespace Kata;

class TicTacToe
{
    private Field $field;

    public function __construct(?Field $field = null)
    {
        if (is_null($field)) {
            $this->field = new Field([
                0 => ['', '', ''],
                1 => ['', '', ''],
                2 => ['', '', '']
            ]);
            return;
        }

        $this->field = $field;
    }

    /**
     * @throws PositionAlreadyTokenException
     */
    public function playerTakeMove(Player $player, Coordinates $coordinates): Field
    {
        $this->field->putIconIntoField($player->getIcon(), $coordinates->getRow(), $coordinates->getColumn());
        return $this->field;
    }
}
