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
     * @throws PositionAlreadyTakenException
     */
    public function putIconIntoField(string $icon, Coordinates $coordinates): void
    {
        if ($this->positionAlreadyTaken($coordinates->getRow(), $coordinates->getColumn())) {
            throw new PositionAlreadyTakenException();
        }

        $this->field[$coordinates->getRow()][$coordinates->getColumn()] = $icon;
    }

    private function positionAlreadyTaken(int $row, int $column): bool
    {
        return $this->field[$row][$column] !== '';
    }
}
