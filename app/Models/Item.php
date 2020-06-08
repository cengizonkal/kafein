<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
 */
class Item extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
