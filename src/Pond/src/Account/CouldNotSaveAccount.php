<?php

namespace Pond\Account;

class CouldNotSaveAccount extends \Exception
{
    const SQLITE_CONSTRAINT_PRIMARY_KEY = 1555;
    const SQLITE_CONSTRAINT_UNIQUE = 2067;
    const SQLITE_UNKNOWN = 0;

    private static array $messageTemplates = [
        self::SQLITE_CONSTRAINT_PRIMARY_KEY => 'ERROR CODE %s The given primary key already exists. Error Message: "%s" ',
        self::SQLITE_CONSTRAINT_UNIQUE => '',
        self::SQLITE_UNKNOWN => ''
    ];

    public static function throwFromErrorCode(int $errorCode, string $message)
    {
        if(!in_array($errorCode, self::$messageTemplates)) {
            $errorCode = self::SQLITE_UNKNOWN;
        }
        $message = sprintf(self::$messageTemplates[$errorCode],$message);
        // throw new self()
    }
}
