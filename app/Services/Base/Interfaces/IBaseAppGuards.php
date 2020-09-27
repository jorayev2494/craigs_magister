<?php

namespace App\Services\Base\Interfaces;

interface IBaseAppGuards 
{
    public const ADMIN = "admin";

    public const SHIPPER = "shipper";

    public const CARRIER = "carrier";

    public const ALL_GUARDS = [self::CARRIER, self::SHIPPER, self::ADMIN];
}