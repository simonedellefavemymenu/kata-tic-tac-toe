<?php

namespace Kata;

use Exception;
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
        $startField = new Field([
            0 => ['', '', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]);
        $expectedField = new Field([
            0 => ['x', '', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]);

        $actualField = $this->ticTacToe->playerTakeMove($player, $startField, $coordinates);

        $this->assertEquals($expectedField, $actualField);
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

    public function testFirstPlayerTakeThirdMove(): void
    {
        $player = new Player('x');
        $coordinates = new Coordinates(2, 2);

        $actualField = new Field([
            0 => ['x', 'o', 'x'],
            1 => ['o', '', ''],
            2 => ['', '', '']
        ]);

        $expectedField = new Field([
            0 => ['x', 'o', 'x'],
            1 => ['o', '', ''],
            2 => ['', '', 'x']
        ]);

        $this->assertEquals($expectedField, $this->ticTacToe->playerTakeMove($player, $actualField, $coordinates));
    }

    public function testSecondPlayerTakeThirdMove(): void
    {
        $player = new Player('o');
        $coordinates = new Coordinates(2, 0);

        $actualField = new Field([
            0 => ['x', 'o', 'x'],
            1 => ['o', '', ''],
            2 => ['', '', 'x']
        ]);

        $expectedField = new Field([
            0 => ['x', 'o', 'x'],
            1 => ['o', '', ''],
            2 => ['o', '', 'x']
        ]);

        $this->assertEquals($expectedField, $this->ticTacToe->playerTakeMove($player, $actualField, $coordinates));
    }

    public function testPlayerTakeMoveToAlreadyTakenCoordinates(): void
    {
        $player = new Player('o');
        $coordinates = new Coordinates(0, 0);

        $actualField = new Field([
            0 => ['x', '', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]);

        $this->expectException(PositionAlreadyTokenException::class);
        $this->ticTacToe->playerTakeMove($player, $actualField, $coordinates);
    }
}
