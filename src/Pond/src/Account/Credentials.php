<?php

declare(strict_types=1);

namespace Pond\Account;

/**
 * Value object which holds the username and password
 */
class Credentials
{
    private Username $username;

    private PondPassword $password;

    public function __construct(Username $username, PondPassword $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername(): Username
    {
        return $this->username;
    }
    
    public function getPassword(): PondPassword
    {
        return $this->password;
    }


}
