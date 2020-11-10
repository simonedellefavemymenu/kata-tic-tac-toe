<?php

namespace Kata;

use Kata\Exceptions\TicTacToeException;

class TicTacToe
{
    private $grid;
    private $lastPlayerMoving = null;

    public function __construct()
    {
        $this->grid = new Grid();
    }

    public function move(Player $player, FieldOffset $fieldOffset): TicTacToeResult
    {
        try {
            $this->grid->takeField($player, $fieldOffset);
            $this->lastPlayerMoving = $player;
            return new TicTacToeValidMove($player, $fieldOffset);
        } catch (TicTacToeException $e) {
            return new TicTacToeInValidMove($e, $fieldOffset);
        }
    }
}
