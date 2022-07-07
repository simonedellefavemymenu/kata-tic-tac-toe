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
        $field = new Field(1, 1);
        $this->assertEquals('1x1', $this->ticTacToe->playerTakeField('x', $field));
    }

    public function testPlayerYTakeFirstField(): void
    {
        $field = new Field(1, 2);
        $this->assertEquals('1x2', $this->ticTacToe->playerTakeField('y', $field));
    }

    public function testPlayerXTakeSecondField(): void
    {
        $field = new Field(1, 3);
        $this->assertEquals('1x3', $this->ticTacToe->playerTakeField('x', $field));
    }

    public function testPlayerYTakeSecondField(): void
    {
        $field = new Field(2, 3);
        $this->assertEquals('2x3', $this->ticTacToe->playerTakeField('y', $field));
    }

    public function testPlayerXTakeThirdField(): void
    {
        $field = new Field(2, 1);
        $this->assertEquals('2x1', $this->ticTacToe->playerTakeField('x', $field));
    }

    public function testPlayerYTakeThirdField(): void
    {
        $field = new Field(2, 2);
        $this->assertEquals('2x2', $this->ticTacToe->playerTakeField('y', $field));
    }

    public function testPlayerXTakeLastField(): void
    {
        $field = new Field(3, 2);
        $this->assertEquals('3x2', $this->ticTacToe->playerTakeField('x', $field));
    }

    public function testPlayerYTakeLastField(): void
    {
        $field = new Field(3, 3);
        $this->assertEquals('3x3', $this->ticTacToe->playerTakeField('y', $field));
    }
}
