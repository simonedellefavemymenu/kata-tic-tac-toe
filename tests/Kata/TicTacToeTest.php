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

    public function testPlayerXTakeFirstField(): void
    {
        $field = new Field(1, 1);
        $player = new Player('x');
        $moves = $this->ticTacToe->playerTakeField($player, $field);
        $this->assertContains(1, $moves['x']['abscissa']);
        $this->assertContains(1, $moves['x']['ordered']);
    }

    public function testPlayerYTakeFirstField(): void
    {
        $player = new Player('y');
        $field = new Field(1, 2);
        $moves = $this->ticTacToe->playerTakeField($player, $field);
        $this->assertContains(1, $moves['y']['abscissa']);
        $this->assertContains(2, $moves['y']['ordered']);
    }

    public function testPlayerXTakeSecondField(): void
    {
        $player = new Player('x');
        $field = new Field(1, 3);
        $moves = $this->ticTacToe->playerTakeField($player, $field);
        $this->assertContains(1, $moves['x']['abscissa']);
        $this->assertContains(3, $moves['x']['ordered']);
    }

    public function testPlayerYTakeSecondField(): void
    {
        $player = new Player('y');
        $field = new Field(2, 3);
        $moves = $this->ticTacToe->playerTakeField($player, $field);
        $this->assertContains(2, $moves['y']['abscissa']);
        $this->assertContains(3, $moves['y']['ordered']);
    }

    public function testPlayerXTakeThirdField(): void
    {
        $player = new Player('x');
        $field = new Field(2, 1);
        $moves = $this->ticTacToe->playerTakeField($player, $field);
        $this->assertContains(2, $moves['x']['abscissa']);
        $this->assertContains(1, $moves['x']['ordered']);
    }

    public function testPlayerYTakeThirdField(): void
    {
        $player = new Player('y');
        $field = new Field(2, 2);
        $moves = $this->ticTacToe->playerTakeField($player, $field);
        $this->assertContains(2, $moves['y']['abscissa']);
        $this->assertContains(2, $moves['y']['ordered']);
    }

    public function testPlayerXTakeLastField(): void
    {
        $player = new Player('x');
        $field = new Field(3, 2);
        $moves = $this->ticTacToe->playerTakeField($player, $field);
        $this->assertContains(3, $moves['x']['abscissa']);
        $this->assertContains(2, $moves['x']['ordered']);
    }

    public function testPlayerYTakeLastField(): void
    {
        $player = new Player('y');
        $field = new Field(3, 3);
        $moves = $this->ticTacToe->playerTakeField($player, $field);
        $this->assertContains(3, $moves['y']['abscissa']);
        $this->assertContains(3, $moves['y']['ordered']);
    }
}
