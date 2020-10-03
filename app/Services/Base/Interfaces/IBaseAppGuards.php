<?php

namespace App\Services\Base\Interfaces;

interface IBaseAppGuards 
{
    public const ADMIN  = "admin";

    public const USER   = "user";

    public const ALL_GUARDS = [self::ADMIN, self::USER];
}