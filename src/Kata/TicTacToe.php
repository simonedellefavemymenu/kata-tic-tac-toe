<?php

namespace Kata;

class TicTacToe
{
    const PLAYER_1_NAME = 'X';
    const PLAYER_2_NAME = 'O';
    private $players = [];
    private $lastMovingPlayer = null;

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

    public function takeField(Player $player, int $field): void
    {
        $this->isValidMove($player, $field);

        $this->grid[$field] = $player->name();
        $this->lastMovingPlayer = $player;
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
        if (!in_array($player, $this->players))
            throw new NotExistingPlayerException();

        if ($player === $this->lastMovingPlayer)
            throw new WrongPlayerMovingException();

        if ($field < 1 || $field > 9)
            throw new NotExistingFieldException();
    }
}

