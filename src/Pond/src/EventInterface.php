<?php

declare(strict_types=1);

namespace Pond;

interface EventInterface
{
    /**
     * @return \DateTimeImmutable The date the event happened
     */
    public function getCreatedAt() : \DateTimeImmutable;
}
