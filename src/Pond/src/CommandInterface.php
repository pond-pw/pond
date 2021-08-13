<?php

declare(strict_types=1);

namespace Pond;

interface CommandInterface
{
    public function dataIsValid() : bool;
}
