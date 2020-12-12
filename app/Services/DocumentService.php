<?php

namespace App\Services;

use App\Models\Document;
use App\Repositories\Eloquent\DocumentRepository;
use App\Services\Base\Abstracts\BaseModelService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentService extends BaseModelService
{

    private const DEFAULT_DISK = 'public';
    private const STR_RANDOM_LENGTH = 32;

    /**
    * @var DocumentRepository $documentEloquentRepository
    */
    private DocumentRepository $documentEloquentRepository;

    public function __construct(DocumentRepository $documentEloquentRepository) {
        $this->documentEloquentRepository = $documentEloquentRepository;
    }

    /**
     * File Store
     *
     * @param string $path
     * @param UploadedFile $file
     * @return Documents
     */
    public function uploadFile(string $path, UploadedFile $file, string $disk = self::DEFAULT_DISK): Document
    {
        $documentData['user_file_name'] = $file->getClientOriginalName();
        $documentData['type'] = $extension = $file->getClientOriginalExtension();
        $documentData['size'] = $file->getSize();
        $documentData['mime_type'] = $file->getClientMimeType();
        $documentData['name'] = $name = Str::random(self::STR_RANDOM_LENGTH) . '.' . $extension;
        $documentData['path'] = sprintf('%s%s', $path, $name);

        $file->storeAs($path, $documentData['name'], $disk);

        return $this->documentEloquentRepository->create($documentData);
    }

    /**
     * Delete files
     *
     * @param string $pathFile
     * @return boolean
     */
    public function deleteFile(Document $document, string $disk = self::DEFAULT_DISK): bool
    {
        if (Storage::disk($disk)->exists($document->path)) {
            Storage::disk($disk)->delete($document->path);
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
    public function deleteDir(string $path, string $disk = self::DEFAULT_DISK): bool
    {
        if (Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->deleteDirectory($path);
            return true;
        }

        return false;
    }
    
}



