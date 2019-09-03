<?php

namespace Speakout\Modules\Account\Models;


use Illuminate\Database\Eloquent\Model;
use Speakout\Modules\Complaint\Models\Complaint;


class Category extends Model
{

    /**
     * @var string
     */
    protected $table = 'category';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * Handle subcategory relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'categoryid');
    }


    /**
     * Handle compalint relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function complaints()
    {
        return $this->hasMany(Complaint::class, 'category');
    }


}