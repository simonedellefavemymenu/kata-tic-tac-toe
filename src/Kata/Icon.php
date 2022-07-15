<?php

namespace Kata;

class Icon
{
    private string $value;

    /**
     * @throws \Exception
     */
    public function __construct(string $value)
    {
        if ($value !== 'x' && $value !== 'o') {
            throw new \Exception();
        }
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
