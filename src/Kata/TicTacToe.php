<?php

namespace Kata;

class TicTacToe
{
    const PLAYER_1_NAME = 'X';
    const PLAYER_2_NAME = 'O';
    private $players = [];
    private $lastMovingPlayer = null;
    private $activeGame = true;
    private $winner = null;

    private $grid = [
        1 => '', 2 => '', 3 => '',
        4 => '', 5 => '', 6 => '',
        7 => '', 8 => '', 9 => '',
    ];

    public function __construct(Player $player1 = null, Player $player2 = null)
    {
        $player1 = $player1 ?? new Player(self::PLAYER_1_NAME);
        $player2 = $player2 ?? new Player(self::PLAYER_2_NAME);
        $this->players = [
            $player1,
            $player2
        ];
    }

    public function takeField(Player $player, int $field): ?bool
    {
        $this->isValidMove($player, $field);

        $this->grid[$field] = $player->name();
        $this->lastMovingPlayer = $player;

        if (
            $this->aRowIsTaken() || $this->aColumnIsTaken() || $this->aDiagonalIsTaken() || $this->fullGrid()
        ) {
            $this->activeGame = false;
            return true;
        }

        return null;
    }

    public function grid(): array
    {
        return $this->grid;
    }

    /**
     * @param Player $player
     * @param int $field
     * @throws NotExistingFieldException
     * @throws NotExistingPlayerException
     * @throws WrongPlayerMovingException
     */
    public function isValidMove(Player $player, int $field): void
    {
        if (!$this->activeGame)
            throw new GameEndedException();

        if (!in_array($player, $this->players))
            throw new NotExistingPlayerException();

        if ($player === $this->lastMovingPlayer)
            throw new WrongPlayerMovingException();

        if ($field < 1 || $field > 9)
            throw new NotExistingFieldException();

        if (!empty($this->grid[$field]))
            throw new FieldOccupiedException();
    }

    /**
     * @return bool
     */
    public function aRowIsTaken(): bool
    {
        return (!empty($this->grid[1]) && $this->grid[1] === $this->grid[2] && $this->grid[1] === $this->grid[3]) ||
            (!empty($this->grid[4]) && $this->grid[4] === $this->grid[5] && $this->grid[4] === $this->grid[6]) ||
            (!empty($this->grid[7]) && $this->grid[7] === $this->grid[8] && $this->grid[7] === $this->grid[9]);
    }

    /**
     * @return bool
     */
    public function aColumnIsTaken(): bool
    {
        return (!empty($this->grid[1]) && $this->grid[1] === $this->grid[4] && $this->grid[1] === $this->grid[7]) ||
            (!empty($this->grid[2]) && $this->grid[2] === $this->grid[5] && $this->grid[2] === $this->grid[8]) ||
            (!empty($this->grid[3]) && $this->grid[3] === $this->grid[6] && $this->grid[3] === $this->grid[9]);
    }

    private function aDiagonalIsTaken()
    {
        if (
            (!empty($this->grid[1]) && $this->grid[1] === $this->grid[5] && $this->grid[1] === $this->grid[9])
        ) {
            $this->winner = $this->grid[1];
            return true;
        }
        if (
            (!empty($this->grid[3]) && $this->grid[3] === $this->grid[5] && $this->grid[3] === $this->grid[7])
        ) {
            $this->winner = $this->grid[3];
            return true;
        }
    }

    private function fullGrid()
    {
        return (
            !empty($this->grid[1]) && !empty($this->grid[2]) && !empty($this->grid[3]) &&
            !empty($this->grid[4]) && !empty($this->grid[5]) && !empty($this->grid[6]) &&
            !empty($this->grid[7]) && !empty($this->grid[8]) && !empty($this->grid[9])
        );
    }

    public function winner(): ?string
    {
        return $this->winner;
    }
}
