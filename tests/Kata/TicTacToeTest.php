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

    public function testShallPass(): void
    {
        $this->assertEquals(1, 1);
    }

    public function testPlayerXTakeFirstField(): void
    {
        $this->assertEquals('1x1', $this->ticTacToe->playerTakeField('x', 1, '1x1'));
    }

    public function testPlayerYTakeFirstField(): void
    {
        $this->assertEquals('1x2', $this->ticTacToe->playerTakeField('y', 1, '1x2'));
    }

    public function testPlayerXTakeSecondField(): void
    {
        $this->assertEquals('1x3', $this->ticTacToe->playerTakeField('x', 2, '1x3'));
    }

    public function testPlayerYTakeSecondField(): void
    {
        $this->assertEquals('2x3', $this->ticTacToe->playerTakeField('y', 2, '2x3'));
    }

    public function testPlayerXTakeThirdField(): void
    {
        $this->assertEquals('2x1', $this->ticTacToe->playerTakeField('x', 3, '2x1'));
    }

    public function testPlayerYTakeThirdField(): void
    {
        $this->assertEquals('2x2', $this->ticTacToe->playerTakeField('y', 3, '2x2'));
    }

    public function testPlayerXTakeLastField(): void
    {
        $this->assertEquals('3x2', $this->ticTacToe->playerTakeField('x', 9, '3x2'));
    }

    public function testPlayerYTakeLastField(): void
    {
        $this->assertEquals('3x3', $this->ticTacToe->playerTakeField('y', 9, '3x3'));
    }
}
