<?php

namespace App\Services;

use App\Models\Blog;
use App\Repositories\Eloquent\BlogRepository;
use App\Services\Base\Abstracts\BaseModelService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BlogService extends BaseModelService
{
    /**
    * @var BlogRepository $blogEloquentRepository
    */
    public BlogRepository $blogEloquentRepository;

    /**
    * @var DocumentService $documentService
    */
    private DocumentService $documentService;

    public function __construct(
            BlogRepository $blogEloquentRepository = null,
            DocumentService $documentService
        ) {
        $this->blogEloquentRepository = $blogEloquentRepository;
        $this->documentService = $documentService;
    }

    public function store(Model $author, array $data): void
    {
        $this->uploadMediaContent($data);
        $author->blogs()->create($this->dataHandler($data));
    }

    public function update(Model $author, int $id, array $data): void
    {
        $foundBlog = $author->blogs()->findOrFail($id);
        $this->updateMediaContent($foundBlog, $data);
        $foundBlog->update($this->dataHandler($data));
    }

    public function delete(Model $author, int $id): void
    {
        $foundBlog = $author->blogs()->findOrFail($id);
        $this->deleteMediaContent($foundBlog);
        $foundBlog->delete();
    }

    public function updateMediaContent(Blog $blog, array &$data): void
    {
        if (array_key_exists('media_content', $data)) {
            $this->deleteMediaContent($blog);
            $this->uploadMediaContent($data);
        }
    }

    private function deleteMediaContent(Blog $blog): void
    {
        if ($blog->mediaContent) {
            $this->documentService->deleteFile($blog->mediaContent);
        }
    }

    private function uploadMediaContent(array &$data): void
    {
        if (array_key_exists('media_content', $data)) {
            $uploadedFile = $this->documentService->uploadFile(
                $this->blogEloquentRepository->model->newInstance()->getMediaContentPath(), 
                $data['media_content']
            );

            unset($data['media_content']);
            $data = array_merge($data, ['media_content_id' => $uploadedFile->id]);
        }
    }

    private function dataHandler(array $data): array
    {
        $handle = [
            'status' => isset($data['publish']) ? Blog::STATUS_PUBLISH_DATE 
                                                : $data['status'],

            'blocked_description' => $data['status'] == Blog::STATUS_BLOCKED ? $data['blocked_description'] 
                                                                             : null
        ];

        return array_merge($data, $handle);
    }

    public function getPublishedBlogs(): Collection
    {
        return $this->blogEloquentRepository->getPublishedBlogs();
    }

    public function findPublishedBlog(int $id): Blog
    {
        return $this->blogEloquentRepository->findPublishedBlog($id);
    }
}
