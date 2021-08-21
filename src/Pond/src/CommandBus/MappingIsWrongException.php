<?php

declare(strict_types=1);


namespace Pond\CommandBus;

class MappingIsWrongException extends \Exception
{
    public function __construct(string $commandName, string $mappedHandler)
    {
        parent::__construct(sprintf('Command handler mapping for command:  "%s". The "%s" handler can not handle the command', $commandName, $mappedHandler),202108162101);
    }
}