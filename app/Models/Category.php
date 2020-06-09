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
 */
class Category extends Model
{
    public function parent()
    {
        return $this->belongsTo(Category::class);
    }
}
