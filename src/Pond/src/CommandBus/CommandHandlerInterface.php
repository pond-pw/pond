<?php

namespace Pond\CommandBus;

interface CommandHandlerInterface
{
    public function canHandle(CommandInterface $command) : bool;

    public function handle(CommandInterface $command) : CommandResultInterface;
}