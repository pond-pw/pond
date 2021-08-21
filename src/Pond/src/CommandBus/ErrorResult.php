<?php

declare(strict_types=1);


namespace Pond\CommandBus;

class ErrorResult implements CommandResultInterface
{

    public function getErrorCode() : int
    {

    }

    public function getErrorMessage() : string
    {

    }
}