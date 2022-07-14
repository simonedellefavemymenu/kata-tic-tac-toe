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

        $player = new Player('x');
        $round = 1;

        $this->assertEquals($expectedField, $this->ticTacToe->playerTakeMove($player, $actualField, $round));
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

        $player = new Player('o');
        $round = 1;

        $this->assertEquals($expectedField, $this->ticTacToe->playerTakeMove($player, $actualField, $round));
    }

    public function testFirstPlayerTakeSecondMove(): void
    {
        $actualField = [
            0 => ['x', 'o', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ];

        $expectedField = [
            0 => ['x', 'o', 'x'],
            1 => ['', '', ''],
            2 => ['', '', '']
        ];

        $player = new Player('x');
        $round = 2;

        $this->assertEquals($expectedField, $this->ticTacToe->playerTakeMove($player, $actualField, $round));
    }

    public function testSecondPlayerTakeSecondMove(): void
    {
        $actualField = [
            0 => ['x', 'o', 'x'],
            1 => ['', '', ''],
            2 => ['', '', '']
        ];

        $expectedField = [
            0 => ['x', 'o', 'x'],
            1 => ['o', '', ''],
            2 => ['', '', '']
        ];

        $player = new Player('o');
        $round = 2;

        $this->assertEquals($expectedField, $this->ticTacToe->playerTakeMove($player, $actualField, $round));
    }
}
