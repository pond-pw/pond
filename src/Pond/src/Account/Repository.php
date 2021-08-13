<?php

declare(strict_types=1);

namespace Pond\Account;

class Repository
{
    public function isAccountNameAvailable(Username $username) : bool
    {
        return true;
    }
}
