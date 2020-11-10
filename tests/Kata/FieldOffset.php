<?php

namespace Kata;

class FieldOffset
{
    private $fieldOffset;

    public function __construct(int $fieldOffset)
    {
        $this->fieldOffset = $fieldOffset;
    }

    public function fieldOffset(): int
    {
        return $this->fieldOffset;
    }

    public function __toString(): string
    {
        return "$this->fieldOffset";
    }
}