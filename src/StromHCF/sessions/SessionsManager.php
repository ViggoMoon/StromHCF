<?php

namespace StromHCF\sessions;

class SessionsManager
{

    public static array $sessions = [];

    public static function createSession(string $sessionName)
    {
        if(self::isSession($sessionName)) return;
        self::$sessions[$sessionName] = new Session($sessionName);
    }

    public static function isSession(string $sessionName): bool
    {
        if(isset(self::$sessions[$sessionName])){
            return true;
        }
        return false;
    }

}