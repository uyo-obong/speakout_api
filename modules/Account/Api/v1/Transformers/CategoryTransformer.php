<?php

namespace Speakout\Modules\Account\Api\v1\Transformers;

use League\Fractal\TransformerAbstract;
use Speakout\Modules\Account\Models\Category;

class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $cat)
    {

        return [
            'id'                   => $cat->id,
            'categoryName'         => $cat->categoryName,
            'categoryDescription'  => $cat->categoryDescription,
            'subcategory'          => $cat->subCategories,
            'creationDate'         => formatDate($cat->creationDate),
        ];
    }
}