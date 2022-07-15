<?php

namespace Kata;

use Exception;

class Field
{
    private array $field;

    public function __construct(array $field)
    {
        $this->field = $field;
    }

    public function getField(): array
    {
        return $this->field;
    }

    /**
     * @throws PositionAlreadyTokenException
     */
    public function putIconIntoField(string $icon, int $row, int $column): void
    {
        if ($this->positionAlreadyToken($row, $column)) {
            throw new PositionAlreadyTokenException();
        }

        $this->field[$row][$column] = $icon;
    }

    private function positionAlreadyToken(int $row, int $column): bool
    {
        return $this->field[$row][$column] !== '';
    }
}
