<?php

namespace Kata;

use Exception;
use PHPUnit\Framework\TestCase;

class TicTacToeTest extends TestCase
{
    /**
     * @throws PositionAlreadyTokenException
     */
    public function testFirstPlayerTakeFirstMove(): void
    {
        $player = new Player('x');
        $coordinates = new Coordinates(0, 0);
        $expectedField = new Field([
            0 => ['x', '', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]);
        $ticTacToe = new TicTacToe();

        $actualField = $ticTacToe->playerTakeMove($player, $coordinates);

        $this->assertEquals($expectedField, $actualField);
    }

    /**
     * @throws PositionAlreadyTokenException
     */
    public function testSecondPlayerTakeFirstMove(): void
    {
        $player = new Player('o');
        $coordinates = new Coordinates(0, 1);
        $expectedField = new Field([
            0 => ['x', 'o', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]);
        $ticTacToe = new TicTacToe(new Field([
            0 => ['x', '', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]));

        $this->assertEquals($expectedField, $ticTacToe->playerTakeMove($player, $coordinates));
    }

    /**
     * @throws PositionAlreadyTokenException
     */
    public function testFirstPlayerTakeSecondMove(): void
    {
        $player = new Player('x');
        $coordinates = new Coordinates(0, 2);
        $expectedField = new Field([
            0 => ['x', 'o', 'x'],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]);
        $ticTacToe = new TicTacToe(new Field([
            0 => ['x', 'o', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]));

        $this->assertEquals($expectedField, $ticTacToe->playerTakeMove($player, $coordinates));
    }

    /**
     * @throws PositionAlreadyTokenException
     */
    public function testSecondPlayerTakeSecondMove(): void
    {
        $player = new Player('o');
        $coordinates = new Coordinates(1, 0);
        $expectedField = new Field([
            0 => ['x', 'o', 'x'],
            1 => ['o', '', ''],
            2 => ['', '', '']
        ]);
        $ticTacToe = new TicTacToe(new Field([
            0 => ['x', 'o', 'x'],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]));

        $this->assertEquals($expectedField, $ticTacToe->playerTakeMove($player, $coordinates));
    }

    /**
     * @throws PositionAlreadyTokenException
     */
    public function testFirstPlayerTakeThirdMove(): void
    {
        $player = new Player('x');
        $coordinates = new Coordinates(2, 2);
        $expectedField = new Field([
            0 => ['x', 'o', 'x'],
            1 => ['o', '', ''],
            2 => ['', '', 'x']
        ]);
        $ticTacToe = new TicTacToe(new Field([
            0 => ['x', 'o', 'x'],
            1 => ['o', '', ''],
            2 => ['', '', '']
        ]));

        $this->assertEquals($expectedField, $ticTacToe->playerTakeMove($player, $coordinates));
    }

    /**
     * @throws PositionAlreadyTokenException
     */
    public function testSecondPlayerTakeThirdMove(): void
    {
        $player = new Player('o');
        $coordinates = new Coordinates(2, 0);
        $expectedField = new Field([
            0 => ['x', 'o', 'x'],
            1 => ['o', '', ''],
            2 => ['o', '', 'x']
        ]);
        $ticTacToe = new TicTacToe(new Field([
            0 => ['x', 'o', 'x'],
            1 => ['o', '', ''],
            2 => ['', '', 'x']
        ]));

        $this->assertEquals($expectedField, $ticTacToe->playerTakeMove($player, $coordinates));
    }

    public function testPlayerTakeMoveToAlreadyTakenCoordinates(): void
    {
        $player = new Player('o');
        $coordinates = new Coordinates(0, 0);
        $ticTacToe = new TicTacToe(new Field([
            0 => ['x', '', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]));

        $this->expectException(PositionAlreadyTokenException::class);
        $ticTacToe->playerTakeMove($player, $coordinates);
    }
}
