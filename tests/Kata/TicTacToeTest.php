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

    public function testShallPass(): void
    {
        $this->assertEquals(1, 1);
    }

    public function testPlayerXTakeFirstField(): void{
        $this->assertEquals('1x1', $this->ticTacToe->playerTakeFirstField('x', 1));
    }

    public function testPlayerYTakeFirstField(): void{
        $this->assertEquals('1x2', $this->ticTacToe->playerTakeFirstField('y', 1));
    }

    public function testPlayerXTakeSecondField(): void{
        $this->assertEquals('1x3', $this->ticTacToe->playerTakeFirstField('x', 2));
    }

    public function testPlayerYTakeSecondField(): void{
        $this->assertEquals('1x4', $this->ticTacToe->playerTakeFirstField('y', 2));
    }
}
