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


}