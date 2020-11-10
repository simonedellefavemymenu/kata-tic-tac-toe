<?php

namespace Kata;

class TicTacToeValidMove extends TicTacToeResult
{
    public function __construct(Player $player, FieldOffset $fieldOffset)
    {
        parent::__construct("Field $fieldOffset taken by $player", true);
    }
}