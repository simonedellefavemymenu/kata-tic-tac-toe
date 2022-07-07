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
        $field = new Field('1x1');
        $this->assertEquals('1x1', $this->ticTacToe->playerTakeField('x', 1, $field));
    }

    public function testPlayerYTakeFirstField(): void
    {
        $field = new Field('1x2');
        $this->assertEquals('1x2', $this->ticTacToe->playerTakeField('y', 1, $field));
    }

    public function testPlayerXTakeSecondField(): void
    {
        $field = new Field('1x3');
        $this->assertEquals('1x3', $this->ticTacToe->playerTakeField('x', 2, $field));
    }

    public function testPlayerYTakeSecondField(): void
    {
        $field = new Field('2x3');
        $this->assertEquals('2x3', $this->ticTacToe->playerTakeField('y', 2, $field));
    }

    public function testPlayerXTakeThirdField(): void
    {
        $field = new Field('2x1');
        $this->assertEquals('2x1', $this->ticTacToe->playerTakeField('x', 3, $field));
    }

    public function testPlayerYTakeThirdField(): void
    {
        $field = new Field('2x2');
        $this->assertEquals('2x2', $this->ticTacToe->playerTakeField('y', 3, $field));
    }

    public function testPlayerXTakeLastField(): void
    {
        $field = new Field('3x2');
        $this->assertEquals('3x2', $this->ticTacToe->playerTakeField('x', 9, $field));
    }

    public function testPlayerYTakeLastField(): void
    {
        $field = new Field('3x3');
        $this->assertEquals('3x3', $this->ticTacToe->playerTakeField('y', 9, $field));
    }
}
