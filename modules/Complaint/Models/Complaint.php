<?php

namespace Speakout\Modules\Complaint\Models;


use Illuminate\Database\Eloquent\Model;
use Speakout\Modules\Account\Models\Category;
use Speakout\Modules\Account\Models\SubCategory;
use Speakout\Modules\Account\Models\User;


class Complaint extends Model
{

    /**
     * @var string
     */
    protected $table = 'tblcomplaints';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $primaryKey = 'complaintNumber';


    /**
     * Handle user relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

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
     * Handle sub category relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategoryid');
    }

}