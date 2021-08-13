<?php

declare(strict_types=1);

namespace Pond\Account\Events;

use Pond\Account\Account;
use Pond\EventInterface;

class Created implements EventInterface
{
    private \DateTimeImmutable $createdAt;

    private Account $account;

    public function __construct(Account $account, \DateTimeImmutable $createdAt)
    {
        $this->account = $account;
        $this->createdAt = $createdAt;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getAccount() : Account
    {
        return $this->account;
    }

}
