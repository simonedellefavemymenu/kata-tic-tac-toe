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

    public function testAPlayerCanTakeAField(): void
    {
        $result = $this->ticTacToe->move(new Player('X'), new FieldOffset(1));

        $this->assertInstanceOf(TicTacToeValidMove::class, $result);
        $this->assertEquals(true, $result->success());
        $this->assertEquals('Field 1 taken by X', $result->message());
    }

    public function testAPlayerCannotTakeAFieldOutOfGrid(): void
    {
        $result = $this->ticTacToe->move(new Player('X'), new FieldOffset(9));

        $this->assertInstanceOf(TicTacToeInvalidMove::class, $result);
        $this->assertEquals(false, $result->success());
        $this->assertEquals('Field 9 is off the grid limits', $result->message());
    }

    public function testAPlayerCannotTakeAnOccupiedField(): void
    {
        $result = $this->ticTacToe->move(new Player('X'), new FieldOffset(8));
        $result = $this->ticTacToe->move(new Player('O'), new FieldOffset(8));

        $this->assertInstanceOf(TicTacToeInvalidMove::class, $result);
        $this->assertEquals(false, $result->success());
        $this->assertEquals('Field 8 is already taken', $result->message());
    }

}
