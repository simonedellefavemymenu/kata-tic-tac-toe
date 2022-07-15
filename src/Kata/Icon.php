<?php

namespace Kata;

class Icon
{
    private const X_ICON = 'x';
    private const O_ICON = 'o';
    private string $value;

    /**
     * @throws \Exception
     */
    public function __construct(string $value)
    {
        if ($this->isNotAllowedIcon($value)) {
            throw new \Exception();
        }
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     * @return bool
     */
    private function isNotAllowedIcon(string $value): bool
    {
        return $value !== self::X_ICON && $value !== self::O_ICON;
    }
}
