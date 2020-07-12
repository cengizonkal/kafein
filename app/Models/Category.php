<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 * @property mixed id
 * @property mixed title
 * @property mixed description
 * @property mixed category_id
 * @property mixed created_at
 * @property mixed updated_at
 * @property Category category
 */
class Category extends Model
{
    protected $appends = ['image_path'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImagePathAttribute()
    {
        return url('images/categories/' . $this->id . '.png');
    }


}
