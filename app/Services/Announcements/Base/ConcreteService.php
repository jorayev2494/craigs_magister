<?php

namespace App\Services\Announcements\Base;

use App\Models\Announcements\Base\Concrete;
use App\Services\Base\Abstracts\BaseModelService;

class ConcreteService extends BaseModelService
{
    public function getModel(): string
    {
        return Concrete::class;
    }
    
}
