<?php

declare(strict_types=1);

namespace Pond\Account\Handler;

use Pond\Account\Account;
use Pond\Account\Commands\Create;
use Pond\Account\Credentials;
use Pond\Account\Id;
use Pond\Account\PondPassword;
use Pond\Account\Repository;
use Pond\Account\Storage;
use Pond\Account\Username;

class CreateHandler
{
    private Repository $repository;

    private Storage $storage;

    public function __construct(Repository $repository, Storage $storage)
    {
        $this->repository = $repository;
        $this->storage = $storage;
    }

    public function handle(Create $createCommand)
    {
        $username = new Username($createCommand->getUsername());
        if(!$this->repository->isAccountNameAvailable($username)) {
            throw new AccountNameIsUnavailable(sprintf('%s is not available as a Username', $username));
        }
        $password = PondPassword::createNew($createCommand->getPassword());
        $credentials = new Credentials($username, $password);
        $id = Id::createNew();
        $account = new Account($id, $credentials);
        $this->storage->save($account);
    }
}
