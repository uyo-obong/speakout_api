<?php

namespace Speakout\Modules\Account\Models;


use Illuminate\Database\Eloquent\Model;


class Category extends Model
{

    /**
     * @var string
     */
    protected $table = 'category';

    /**
     * Handle subcategory relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'categoryid');
    }

}