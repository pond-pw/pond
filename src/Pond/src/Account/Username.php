<?php

declare(strict_types=1);

namespace Pond\Account;

/**
 * Value Object representing the username
 */
final class Username
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
