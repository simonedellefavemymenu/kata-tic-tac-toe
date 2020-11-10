<?php

namespace Kata;

use Exception;
use Kata\Exceptions\AlreadyTakenFieldException;
use Kata\Exceptions\FieldOffTheGridException;

class Grid
{
    private $grid = [
        0 => '', 1 => '', 2 => '',
        3 => '', 4 => '', 5 => '',
        6 => '', 7 => '', 8 => '',
    ];

    public function takeField(Player $player, FieldOffset $fieldOffset): void
    {
        $this->verifyIsValidMove($fieldOffset);
        $this->grid[$fieldOffset->fieldOffset()] = $player->name();
    }

    /**
     * @param FieldOffset $fieldOffset
     * @throws AlreadyTakenFieldException
     * @throws FieldOffTheGridException
     */
    public function verifyIsValidMove(FieldOffset $fieldOffset): void
    {
        if (!isset($this->grid[$fieldOffset->fieldOffset()]))
            throw new FieldOffTheGridException($fieldOffset);

        if (!empty($this->grid[$fieldOffset->fieldOffset()]))
            throw new AlreadyTakenFieldException($fieldOffset);
    }
}

