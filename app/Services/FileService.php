<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileService
{
    private const LENGTH_RANDOM_NAME = 32;
    private const DISK_PUBLIC = 'public';

    public function uploadFile(string $path, UploadedFile $file, string $disc = self::DISK_PUBLIC): string
    {
        $fileData['path'] = $path;
        $fileData['mine_type'] = $file->getClientMimeType();
        $fileData['original_name'] = $file->getClientOriginalName();
        $fileData['extension'] = $file->getClientOriginalExtension();
        $fileData['generate_random_name'] = Str::random(self::LENGTH_RANDOM_NAME) . '.' . $fileData['extension'];

        $file->storeAs($path, $fileData['generate_random_name'], ['disk' => $disc]);
        return $fileData['generate_random_name'];
    }

    public function updateFile(string $path, string $deleteFileName, UploadedFile $file, string $disc = self::DISK_PUBLIC): string
    {
        $this->deleteFile($path, $deleteFileName, $disc);
        return $this->uploadFile($path, $file, $disc);
    }

    public function deleteFile(string $path, string $fileName, string $disc = self::DISK_PUBLIC): bool
    {
        if (!Str::contains($fileName, '/default.') && Storage::disk($disc)->exists($path)) {
            return Storage::disk(self::DISK_PUBLIC)->delete($fileName);
        }

        return true;
    }

}
