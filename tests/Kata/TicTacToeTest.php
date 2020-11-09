<?php

namespace Kata;

use PHPUnit\Framework\TestCase;
use Kata\TicTacToe;

class TicTacToeTest extends TestCase
{
    private $ticTacToe;

    protected function setUp(): void
    {
        $this->ticTacToe = new TicTacToe();
    }

    public function testTheGameRefuseTakingField10BecauseOffTheGrid(): void
    {
        $playerX = new Player('X');

        $this->expectException(NotExistingFieldException::class);
        $this->ticTacToe->takeField($playerX, 10);
    }

    public function testTheGameRefuseTakingField0BecauseOffTheGrid(): void
    {
        $playerX = new Player('X');

        $this->expectException(NotExistingFieldException::class);
        $this->ticTacToe->takeField($playerX, 0);
    }

    public function testTheGameAcceptTakingField1BecauseInTheGrid(): void
    {
        $playerX = new Player('X');

        $this->ticTacToe->takeField($playerX, 1);

        $actual = $this->ticTacToe->grid();
        $this->assertEquals([
            1 => 'X', 2 => '', 3 => '',
            4 => '', 5 => '', 6 => '',
            7 => '', 8 => '', 9 => '',
        ], $actual);
    }

    public function testTheGameAcceptTakingField9BecauseInTheGrid(): void
    {
        $playerX = new Player('X');

        $this->ticTacToe->takeField($playerX, 9);

        $actual = $this->ticTacToe->grid();
        $this->assertEquals([
            1 => '', 2 => '', 3 => '',
            4 => '', 5 => '', 6 => '',
            7 => '', 8 => '', 9 => 'X',
        ], $actual);
    }

    public function testTheGameAcceptTakingField5BecauseInTheGrid(): void
    {
        $playerX = new Player('X');

        $this->ticTacToe->takeField($playerX, 5);

        $actual = $this->ticTacToe->grid();
        $this->assertEquals([
            1 => '', 2 => '', 3 => '',
            4 => '', 5 => 'X', 6 => '',
            7 => '', 8 => '', 9 => '',
        ], $actual);
    }

    public function testThereAreOnlyTwoPlayersInTheGame(): void
    {
        $playerZ = new Player('Z');

        $this->expectException(NotExistingPlayerException::class);
        $this->ticTacToe->takeField($playerZ, 2);
    }

    public function testTheGameNotAllowOnePlayerMovingTwoTimes(): void
    {
        $playerX = new Player('X');

        $this->ticTacToe->takeField($playerX, 1);
        $this->expectException(WrongPlayerMovingException::class);
        $this->ticTacToe->takeField($playerX, 2);
    }

    public function testTheGameAllowOnePlayerMovingAfterAnother(): void
    {
        $playerX = new Player('X');
        $playerO = new Player('O');

        $this->ticTacToe->takeField($playerX, 1);
        $this->ticTacToe->takeField($playerO, 2);

        $actual = $this->ticTacToe->grid();
        $this->assertEquals([
            1 => 'X', 2 => 'O', 3 => '',
            4 => '', 5 => '', 6 => '',
            7 => '', 8 => '', 9 => '',
        ], $actual);
    }

    public function testTheGameAllowOnePlayerMovingAfterAnotherThenAgain(): void
    {
        $playerX = new Player('X');
        $playerO = new Player('O');

        $this->ticTacToe->takeField($playerX, 1);
        $this->ticTacToe->takeField($playerO, 2);
        $this->ticTacToe->takeField($playerX, 3);
        $this->ticTacToe->takeField($playerO, 4);

        $actual = $this->ticTacToe->grid();
        $this->assertEquals([
            1 => 'X', 2 => 'O', 3 => 'X',
            4 => 'O', 5 => '', 6 => '',
            7 => '', 8 => '', 9 => '',
        ], $actual);
    }

    public function testTheGameNotAllowOnePlayerMovingInOccupiedField(): void
    {
        $playerX = new Player('X');
        $playerO = new Player('O');

        $this->ticTacToe->takeField($playerX, 1);
        $this->expectException(FieldOccupiedException::class);
        $this->ticTacToe->takeField($playerO, 1);
    }

    public function testGameEndsWhenAPlayerTakeAllFieldsInARow(): void
    {
        $playerX = new Player('X');
        $playerO = new Player('O');

        $this->ticTacToe->takeField($playerX, 1);
        $this->ticTacToe->takeField($playerO, 6);
        $this->ticTacToe->takeField($playerX, 2);
        $this->ticTacToe->takeField($playerO, 4);
        $result = $this->ticTacToe->takeField($playerX, 3);

        $this->assertEquals(true, $result);
        $this->expectException(GameEndedException::class);
        $this->ticTacToe->takeField($playerO, 7);
        $actual = $this->ticTacToe->grid();
        $this->assertEquals([
            1 => 'X', 2 => 'X', 3 => 'X',
            4 => 'O', 5 => '', 6 => 'O',
            7 => '', 8 => '', 9 => '',
        ], $actual);
        $actualWinner = $this->ticTacToe->winner();
        $this->assertEquals('X', $actualWinner);
    }

    public function testGameEndsWhenAPlayerTakeAllFieldsInAColumn(): void
    {
        $playerX = new Player('X');
        $playerO = new Player('O');

        $this->ticTacToe->takeField($playerX, 2);
        $this->ticTacToe->takeField($playerO, 6);
        $this->ticTacToe->takeField($playerX, 5);
        $this->ticTacToe->takeField($playerO, 4);
        $result = $this->ticTacToe->takeField($playerX, 8);

        $this->assertEquals(true, $result);
        $this->expectException(GameEndedException::class);
        $this->ticTacToe->takeField($playerO, 7);
        $actual = $this->ticTacToe->grid();
        $this->assertEquals([
            1 => '', 2 => 'X', 3 => '',
            4 => 'O', 5 => 'X', 6 => 'O',
            7 => '', 8 => 'X', 9 => '',
        ], $actual);
        $actualWinner = $this->ticTacToe->winner();
        $this->assertEquals('X', $actualWinner);
    }

    public function testGameEndsWhenAPlayerTakeAllFieldsInADiagonal(): void
    {
        $playerX = new Player('X');
        $playerO = new Player('O');

        $this->ticTacToe->takeField($playerX, 1);
        $this->ticTacToe->takeField($playerO, 6);
        $this->ticTacToe->takeField($playerX, 5);
        $this->ticTacToe->takeField($playerO, 4);
        $result = $this->ticTacToe->takeField($playerX, 9);

        $this->assertEquals(true, $result);
        $this->expectException(GameEndedException::class);
        $this->ticTacToe->takeField($playerO, 7);
        $actual = $this->ticTacToe->grid();
        $this->assertEquals([
            1 => 'X', 2 => '', 3 => '',
            4 => 'O', 5 => 'X', 6 => 'O',
            7 => '', 8 => '', 9 => 'X',
        ], $actual);
        $actualWinner = $this->ticTacToe->winner();
        $this->assertEquals('X', $actualWinner);
    }

    public function testGameEndsWhenAPlayerTakeAllFieldsInTheOtherDiagonal(): void
    {
        $playerX = new Player('X');
        $playerO = new Player('O');

        $this->ticTacToe->takeField($playerX, 3);
        $this->ticTacToe->takeField($playerO, 6);
        $this->ticTacToe->takeField($playerX, 5);
        $this->ticTacToe->takeField($playerO, 4);
        $result = $this->ticTacToe->takeField($playerX, 7);

        $this->assertEquals(true, $result);
        $this->expectException(GameEndedException::class);
        $this->ticTacToe->takeField($playerO, 9);
        $actual = $this->ticTacToe->grid();
        $this->assertEquals([
            1 => '', 2 => '', 3 => 'X',
            4 => 'O', 5 => 'X', 6 => 'O',
            7 => 'X', 8 => '', 9 => '',
        ], $actual);
        $actualWinner = $this->ticTacToe->winner();
        $this->assertEquals('X', $actualWinner);
    }

    public function testGameEndsWhenAllFieldsAreTaken(): void
    {
        $playerX = new Player('X');
        $playerO = new Player('O');

        $this->ticTacToe->takeField($playerX, 1);
        $this->ticTacToe->takeField($playerO, 2);
        $this->ticTacToe->takeField($playerX, 3);
        $this->ticTacToe->takeField($playerO, 4);
        $this->ticTacToe->takeField($playerX, 5);
        $this->ticTacToe->takeField($playerO, 7);
        $this->ticTacToe->takeField($playerX, 6);
        $this->ticTacToe->takeField($playerO, 9);
        $result = $this->ticTacToe->takeField($playerX, 8);

        $this->assertEquals(true, $result);
        $this->expectException(GameEndedException::class);
        $this->ticTacToe->takeField($playerO, 9);
        $actualGrid = $this->ticTacToe->grid();
        $this->assertEquals([
            1 => 'X', 2 => 'O', 3 => 'X',
            4 => 'O', 5 => 'X', 6 => 'X',
            7 => 'O', 8 => 'X', 9 => 'O',
        ], $actualGrid);
        $actualWinner = $this->ticTacToe->winner();
        $this->assertEquals(null, $actualWinner);
    }

}
