<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class FileServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'fileService';
    }
}
