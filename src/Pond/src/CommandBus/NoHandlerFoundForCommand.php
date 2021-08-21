<?php

declare(strict_types=1);


namespace Pond\CommandBus;

class NoHandlerFoundForCommand extends \Exception
{
    public function __construct(string $commandName)
    {
        parent::__construct(sprintf('There was no handler found for the command "%s"', $commandName),202108162100);
    }
}