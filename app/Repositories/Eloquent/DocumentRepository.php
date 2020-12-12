<?php

namespace App\Repositories\Eloquent;

use App\Models\Document;
use App\Repositories\Eloquent\Abstracts\BaseEloquentModelRepository;

class DocumentRepository extends BaseEloquentModelRepository
{
    public function getModel(): string
    {
        return Document::class;
    }
}
