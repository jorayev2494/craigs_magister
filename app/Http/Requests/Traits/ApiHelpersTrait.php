<?php

namespace App\Http\Requests\Traits;


/**
 * ApiHelpersRequestTrait
 */
trait ApiHelpersTrait
{
    public function all($keys = null): array
    {
        return array_merge(parent::all(), $this->route()->parameters);
    }
}
