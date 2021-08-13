<?php

declare(strict_types=1);

namespace Pond\Account;

/**
 * This class represents a user account which enables the user
 * to use the pond password manager application
 */
final class Account
{
    private Credentials $credentials;

    public function __construct(Credentials $credentials)
    {
        $this->credentials = $credentials;
    }

    public function getCredentials() : Credentials
    {
        return $this->credentials;
    }
}
