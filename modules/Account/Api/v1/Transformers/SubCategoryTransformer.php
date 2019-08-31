<?php

namespace Speakout\Modules\Account\Api\v1\Transformers;

use League\Fractal\TransformerAbstract;
use Speakout\Modules\Account\Models\SubCategory;

class SubCategoryTransformer extends TransformerAbstract
{
    public function transform(SubCategory $sub)
    {

        return [
            'id'                   => $sub->id,
            'subcategory'          => $sub->subcategory,
            'categoryid'           => $sub->category,
            'creationDate'         => formatDate($sub->creationDate),
        ];
    }
}