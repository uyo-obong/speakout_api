<?php

namespace Speakout\Modules\Account\Api\v1\Repositories;

use Speakout\Modules\Account\Models\Category;
use Speakout\Modules\Account\Models\SubCategory;
use Speakout\Modules\BaseRepository;

class CategoryRepository extends BaseRepository
{
    /**
     * @var Category
     *
     */
    private $category;

    private  $subcategory;

    /**
     * CategoryRepository constructor.
     * @param Category $category
     * @param SubCategory $subcategory
     */
    public function __construct(Category $category, SubCategory $subcategory)
    {
        $this->category = $category;
        $this->subcategory = $subcategory;
    }


    /**
     * Return all the categories in the database
     *
     * @return \Illuminate\Database\Eloquent\Collection|Category[]
     */
    public function listCategories()
    {
        return  $this->category->all();
    }

    /**
     * Return all the subcategories in the database
     *
     * @return \Illuminate\Database\Eloquent\Collection|Category[]
     */
    public function listSubCategories()
    {
        return $this->subcategory->all();
    }

}