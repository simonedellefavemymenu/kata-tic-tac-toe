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
     * @throws PositionAlreadyTakenException
     */
    public function playerTakeMove(Icon $icon, Coordinates $coordinates): Field
    {
        $this->field->putIconIntoField($icon, $coordinates);
        return $this->field;
    }
}
