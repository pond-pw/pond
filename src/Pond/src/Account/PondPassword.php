<?php

declare(strict_types=1);

namespace Pond\Account;

/**
 * Value object representing a password which the user needs
 * to authenticate inside the pond application
 */
final class PondPassword
{
    private string $hash;

    public function __construct(string $hashedPasswordString)
    {
        $this->hash = $hashedPasswordString;
    }

    public function getHash() : string
    {
        return $this->hash;
    }

    public function verify(string $plainText) : bool
    {
        return password_verify($plainText, $this->hash);
    }

    public function __toString(): string
    {
        return $this->hash;
    }

    public static function createNew(string $plainText, string $algorithm = PASSWORD_BCRYPT) : self
    {
        return new PondPassword(password_hash($plainText, $algorithm));
    }

}
