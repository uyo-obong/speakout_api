<?php

namespace Speakout\Modules\Account\Api\v1\Controllers;

use Speakout\Modules\Account\Api\v1\Repositories\CategoryRepository;
use Speakout\Modules\Account\Api\v1\Transformers\CategoryTransformer;
use Speakout\Modules\Account\Api\v1\Transformers\SubCategoryTransformer;
use Speakout\Modules\BaseController as Controller;


class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private $category;

    /**
     * @var CategoryTransformer
     */
    private  $catTransformer;

    /**
     * @var SubCategoryTransformer
     */
    private  $subTransformer;

    /**
     * CategoryController constructor.
     * @param CategoryRepository $category
     * @param CategoryTransformer $catTransformer
     * @param SubCategoryTransformer $subTransformer
     */
    public function __construct(CategoryRepository $category,
                                CategoryTransformer $catTransformer,
                                SubCategoryTransformer $subTransformer)
    {
        $this->category = $category;
        $this->catTransformer = $catTransformer;
        $this->subTransformer = $subTransformer;
    }

    /**
     * Handle incoming request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listCategories()
    {
        $cat = $this->category->listCategories();
        if ($cat)
            return $this->transform($cat, $this->catTransformer);
    }

    /**
     * Handle incoming request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listSubCategory()
    {
        $sub = $this->category->listSubCategories();
        if ($sub)
            return $this->transform($sub, $this->subTransformer);
    }
}