<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Collection\Collection;

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
 * @property Image[]|Collection images
 */
class Category extends Model
{


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }


}
