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
        $expectedField = new Field([
            0 => ['', '', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]);

        $actualField = new Field([
            0 => ['x', '', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]);

        $player = new Player('x');
        $round = 1;

        $this->assertEquals($actualField, $this->ticTacToe->playerTakeMove($player, $expectedField, $round));
    }

    public function testSecondPlayerTakeFirstMove(): void
    {
        $actualField = new Field([
            0 => ['x', '', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]);

        $expectedField = new Field([
            0 => ['x', 'o', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]);

        $player = new Player('o');
        $round = 1;

        $this->assertEquals($expectedField, $this->ticTacToe->playerTakeMove($player, $actualField, $round));
    }

    public function testFirstPlayerTakeSecondMove(): void
    {
        $actualField = new Field([
            0 => ['x', 'o', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]);

        $expectedField = new Field([
            0 => ['x', 'o', 'x'],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]);

        $player = new Player('x');
        $round = 2;

        $this->assertEquals($expectedField, $this->ticTacToe->playerTakeMove($player, $actualField, $round));
    }

    public function testSecondPlayerTakeSecondMove(): void
    {
        $actualField = new Field([
            0 => ['x', 'o', 'x'],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]);

        $expectedField = new Field([
            0 => ['x', 'o', 'x'],
            1 => ['o', '', ''],
            2 => ['', '', '']
        ]);

        $player = new Player('o');
        $round = 2;

        $this->assertEquals($expectedField, $this->ticTacToe->playerTakeMove($player, $actualField, $round));
    }
}
