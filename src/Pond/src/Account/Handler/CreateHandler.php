<?php

declare(strict_types=1);

namespace Pond\Account\Handler;

use Pond\Account\Account;
use Pond\Account\Commands\Create;
use Pond\Account\Credentials;
use Pond\Account\PondPassword;
use Pond\Account\Repository;
use Pond\Account\Username;

class CreateHandler
{
    private Repository $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(Create $createCommand)
    {

        $username = new Username($createCommand->getUsername());
        if(!$this->repository->isAccountNameAvailable($username)) {
            throw new AccountNameIsUnavailable(sprintf('%s is not available as Username', $username));
        }

        $password = PondPassword::createNew($createCommand->getPassword());
        $credentials = new Credentials($username, $password);
        $account = new Account($credentials);


    }
}
