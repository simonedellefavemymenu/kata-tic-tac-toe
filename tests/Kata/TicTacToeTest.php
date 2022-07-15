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
        $player = new Player('x');
        $coordinates = new Coordinates(0, 0);

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

        $this->assertEquals($actualField, $this->ticTacToe->playerTakeMove($player, $expectedField, $coordinates));
    }

    public function testSecondPlayerTakeFirstMove(): void
    {
        $player = new Player('o');
        $coordinates = new Coordinates(0, 1);

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

        $this->assertEquals($expectedField, $this->ticTacToe->playerTakeMove($player, $actualField, $coordinates));
    }

    public function testFirstPlayerTakeSecondMove(): void
    {
        $player = new Player('x');
        $coordinates = new Coordinates(0, 2);

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

        $this->assertEquals($expectedField, $this->ticTacToe->playerTakeMove($player, $actualField, $coordinates));
    }

    public function testSecondPlayerTakeSecondMove(): void
    {
        $player = new Player('o');
        $coordinates = new Coordinates(1, 0);

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

        $this->assertEquals($expectedField, $this->ticTacToe->playerTakeMove($player, $actualField, $coordinates));
    }
}
