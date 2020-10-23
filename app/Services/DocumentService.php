<?php

namespace App\Services;

use App\Models\Document;
use App\Services\Base\Abstracts\BaseModelService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Str;

class DocumentService extends BaseModelService
{

    private const STR_RANDOM_LENGTH = 32;

    public function getModel(): string
    {
        return Document::class;
    }

    /**
     * Set base model file storage folder
     *
     * @return string
     */
    // protected function baseFolder(): string
    // {
    //     return '';
    // }

    /**
     * File Store
     *
     * @param string $path
     * @param UploadedFile $file
     * @return Documents
     */
    public function storeFile(string $path, UploadedFile $file): Document
    {
        $documentData['user_file_name'] = $file->getClientOriginalName();
        $documentData['type'] = $extension = $file->getClientOriginalExtension();
        $documentData['size'] = $file->getSize();
        $documentData['mime_type'] = $file->getClientMimeType();
        $documentData['name'] = $name = Str::random(self::STR_RANDOM_LENGTH) . '.' . $extension;
        $documentData['path'] = sprintf('%s/%s', $path, $name);

        $file->storeAs($path, $documentData['name']);

        return $this->create($documentData);
    }

    /**
     * Delete files
     *
     * @param string $pathFile
     * @return boolean
     */
    public function deleteFile(Document $document): bool
    {
        if (Storage::exists($document->path)) {
            Storage::delete($document->path);
            return $document->delete();
        }

        return false;
    }

    /**
     * Delete Directory
     *
     * @param string $path
     * @return boolean
     */
    public function deleteDir(string $path): bool
    {
        if (Storage::exists($path)) {
            Storage::deleteDirectory($path);
            return true;
        }

        return false;
    }
    
}



