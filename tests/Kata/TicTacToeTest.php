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
        $actualField = [
            0 => ['', '', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ];

        $expectedField = [
            0 => ['x', '', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ];

        $player = 'x';

        $this->assertEquals($expectedField, $this->ticTacToe->playerTakeMove($player, $actualField));
    }

    public function testSecondPlayerTakeFirstMove(): void
    {
        $actualField = [
            0 => ['x', '', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ];

        $expectedField = [
            0 => ['x', 'o', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ];

        $player = 'o';

        $this->assertEquals($expectedField, $this->ticTacToe->playerTakeMove($player, $actualField));
    }
}
