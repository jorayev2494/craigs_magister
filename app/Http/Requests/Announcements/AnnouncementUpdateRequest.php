<?php

namespace App\Http\Requests\Announcements;

use App\Http\Requests\Abstracts\APIFormRequest;
use App\Models\Announcements\Base\Announcement;
use App\Services\Base\Interfaces\IBaseAppGuards;
use App\Services\CategoryService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class AnnouncementUpdateRequest extends APIFormRequest
{

    /**
    * @var CategoryService $categoryService
    */
    private CategoryService $categoryService;

    /**
    * @var string $concretePrefix
    */
    private string $concretePrefix = Announcement::CONCRETE_PREFIX;

    /**
    * @var array $concreteRules
    */
    private array $concreteRules = [];

    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }

    protected function prepareForValidation(): void
    {
        $foundCategory = $this->categoryService->categoryEloquentRepository->find($this->category_id);

        foreach ($foundCategory->getConcreteModel()::VALIDATION_RULES as $property => $rule) {
            $this->concreteRules["{$this->concretePrefix}.{$property}"] = $rule;
        }

        $uploadedImages = [];
        foreach ($this->images as $key => $image) {
            if (is_file($image)) {
                $uploadedImages[$key] = $image;
            }
        }

        $this->merge(!empty($images) ? ['images' => $uploadedImages] : ['images' => null]);
    }
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Auth::guard(IBaseAppGuards::USER)->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return array_merge([
            // 'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|integer',
            'price_per' => 'required|string|in:' . implode(',', Announcement::PRICE_PERMISSIONS),
            'is_price_contractual' => 'required|boolean',
            // 'location' => 'required|array',
            'country_id' => 'required|integer|exists:countries,id',
            'city_id' => 'required|integer|exists:cities,id',
            'location_google_latitude' => 'required|integer',
            'location_google_longitude' => 'required|integer',
            'images' => 'exclude_if:images,null|nullable|array|max:10',
            // 'images.*' => 'nullable|file|mimes:' . implode(',', Announcement::IMAGE_MIMES) . '|max:20000',
            'video' => 'nullable|file',
            $this->concretePrefix => 'required|array',
        ], $this->concreteRules);
    }

    public function messages(): array
    {
        return [
            'images.*.required' => 'Please upload an image only',
            'images.*.mimes' => 'Only ' . implode(',', Announcement::IMAGE_MIMES) . ' and bmp images are allowed',
            'images.*.max' => 'Sorry! Maximum allowed size for an image is 2MB',
        ];
    }
}
