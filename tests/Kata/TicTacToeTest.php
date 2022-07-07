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
        $this->assertEquals('1x1', $this->ticTacToe->playerTakeFirstField('x'));
    }
}
