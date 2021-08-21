<?php

namespace Pond\Account;

class CouldNotSaveAccount extends \Exception
{
    const SQLITE_CONSTRAINT_PRIMARY_KEY = 1555;
    const SQLITE_CONSTRAINT_UNIQUE = 2067;
    const SQLITE_UNKNOWN = 0;

    private static array $messageTemplates = [
        self::SQLITE_CONSTRAINT_PRIMARY_KEY => 'ERROR CODE %s The given primary key already exists. Original message "%s"',
        self::SQLITE_CONSTRAINT_UNIQUE => 'ERROR CODE %s The given username has to be unique. Original message "%s"',
        self::SQLITE_UNKNOWN => 'ERROR CODE %s Unexpected error. Original message "%s"'
    ];

    public static function throwFromErrorCode(int $errorCode, string $message)
    {
        if (!in_array($errorCode, self::$messageTemplates)) {
            $errorCode = self::SQLITE_UNKNOWN;
        }
        $message = sprintf(self::$messageTemplates[$errorCode], $message);
        throw new self($message);
    }
}
