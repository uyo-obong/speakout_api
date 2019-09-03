<?php

namespace Speakout\Modules\Account\Models;


use Illuminate\Database\Eloquent\Model;


class SubCategory extends Model
{

    /**
     * @var string
     */
    protected $table = 'subcategory';

    /**
     * Handle category relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryid');
    }


    /**
     * Handle compalint relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function complaints()
    {
        return $this->hasMany(Complaint::class, 'subcategoryid');
    }
}