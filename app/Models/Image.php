<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Image
 * @package App\Models
 * @property mixed id
 * @property mixed imageable_id
 * @property mixed imageable_type
 * @property mixed path
 * @property mixed is_selected
 * @property mixed width
 * @property mixed height
 * @property mixed original_name
 * @property mixed created_at
 * @property mixed updated_at
 * @property mixed full_path
 */
class Image extends Model
{
    protected $appends = ['full_path'];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function getFullPathAttribute()
    {
        return url($this->path);
    }

}
