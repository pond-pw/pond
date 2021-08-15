<?php

declare(strict_types=1);

namespace Pond\Account;

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

class Id
{
    private UuidInterface $uuid;

    public function __construct(UuidInterface $uuid)
    {
        $this->uuid = $uuid;
    }

    public function __toString(): string
    {
        return $this->uuid->toString();
    }

    public static function createNew() : self
    {
        $uuid = Uuid::uuid4();
        return new self($uuid);
    }
}
