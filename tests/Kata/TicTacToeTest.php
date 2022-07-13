<?php

namespace Kata;

use PHPUnit\Framework\TestCase;

class TicTacToeTest extends TestCase
{
    private TicTacToe $ticTacToe;

    protected function setUp(): void
    {
        $this->ticTacToe = new TicTacToe();
    }

    public function testFirstPlayerTakeFirstMove(): void
    {
        $field = [
            0 => ['x'], [], [],
            1 => [], [], [],
            2 => [], [], []
        ];

        $player = 'x';

        $this->assertEquals($field, $this->ticTacToe->playerTakeMove($player));
    }
}
