<?php

namespace Kata;

use PHPUnit\Framework\TestCase;

class TicTacToeTest extends TestCase
{
    /**
     * @throws PositionAlreadyTakenException
     */
    public function testFirstPlayerTakeFirstMove(): void
    {
        $player = new Icon('x');
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
     * @throws PositionAlreadyTakenException
     */
    public function testSecondPlayerTakeFirstMove(): void
    {
        $player = new Icon('o');
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
     * @throws PositionAlreadyTakenException
     */
    public function testFirstPlayerTakeSecondMove(): void
    {
        $player = new Icon('x');
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
     * @throws PositionAlreadyTakenException
     */
    public function testSecondPlayerTakeSecondMove(): void
    {
        $player = new Icon('o');
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
     * @throws PositionAlreadyTakenException
     */
    public function testFirstPlayerTakeThirdMove(): void
    {
        $player = new Icon('x');
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
     * @throws PositionAlreadyTakenException
     */
    public function testSecondPlayerTakeThirdMove(): void
    {
        $player = new Icon('o');
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
        $player = new Icon('o');
        $coordinates = new Coordinates(0, 0);
        $ticTacToe = new TicTacToe(new Field([
            0 => ['x', '', ''],
            1 => ['', '', ''],
            2 => ['', '', '']
        ]));

        $this->expectException(PositionAlreadyTakenException::class);
        $ticTacToe->playerTakeMove($player, $coordinates);
    }

    public function testPIconIsNotAllowed(): void
    {
        $this->expectException(\Exception::class);
        $icon = new Icon('p');
    }

    public function testAIconIsNotAllowed(): void
    {
        $this->expectException(\Exception::class);
        $icon = new Icon('a');
    }

    public function test1NumberIconIsNotAllowed(): void
    {
        $this->expectException(\Exception::class);
        $icon = new Icon('1');
    }

    public function testSpecialCharacterIconIsNotAllowed(): void
    {
        $this->expectException(\Exception::class);
        $icon = new Icon('£');
    }
}
