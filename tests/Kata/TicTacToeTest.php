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

    public function testHandle(): void
    {
        $field = [
            0 => [], [], [],
            1 => [], [], [],
            2 => [], [], []
        ];

        $this->assertEquals($field, $this->ticTacToe->handle());
    }
}
