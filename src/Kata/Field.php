<?php

namespace Kata;

use Exception;

class Field
{
    /** @var array<array<string>> $field */
    private array $field;

    /**
     * @param array<array<string>> $field
     */
    public function __construct(array $field)
    {
        $this->field = $field;
    }

    /**
     * @return array<array<string>>
     */
    public function getField(): array
    {
        return $this->field;
    }

    /**
     * @throws PositionAlreadyTakenException
     */
    public function putIconIntoField(Icon $icon, Coordinates $coordinates): void
    {
        if ($this->positionAlreadyTaken($coordinates->getRow(), $coordinates->getColumn())) {
            throw new PositionAlreadyTakenException();
        }

        $this->field[$coordinates->getRow()][$coordinates->getColumn()] = $icon->getValue();
    }

    private function positionAlreadyTaken(int $row, int $column): bool
    {
        return $this->field[$row][$column] !== '';
    }
}
