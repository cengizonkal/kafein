<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Collection\Collection;

/**
 * Class Item
 * @package App\Models
 * @property mixed id
 * @property mixed title
 * @property mixed description
 * @property mixed options
 * @property mixed price
 * @property mixed image_path
 * @property mixed category_id
 * @property mixed created_at
 * @property mixed updated_at
 * @property Image[]|Collection images
 * @property Category category
 * @property boolean is_available
 */
class Item extends Model
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
