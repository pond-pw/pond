<?php

declare(strict_types=1);

namespace Pond\Account\Commands;

use Laminas\Validator\StringLength;
use Pond\CommandInterface;

class Create implements CommandInterface
{
    private string $username;

    private string $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function dataIsValid(): bool
    {
        // length constraints are used to improve security to make brute forcing harder
        $usernameValidator = new StringLength(['min' => 3, 'max' => 255]);
        $passwordValidator = new StringLength(['min' => 8, 'max' => 255]);

        return $usernameValidator->isValid($this->getUsername())
            && $passwordValidator->isValid($this->getPassword());

    }


}
