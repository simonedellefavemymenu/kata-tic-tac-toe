<?php

namespace Kata;

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

    public function putIconIntoField(string $icon, int $row, int $column): void
    {
        $this->field[$row][$column] = $icon;
    }
}
