<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Str;

class FileService
{

    public function deleteFile(string ...$files): bool
    {
        if (!Str::contains([...$files], 'default.jpg')) {
            dd("awdawdawd");
            Storage::delete(...$files);
        }
        return true;
    }

}
