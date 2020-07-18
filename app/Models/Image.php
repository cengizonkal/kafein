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
 * @property mixed thumbnail
 * @property mixed is_selected
 * @property mixed width
 * @property mixed height
 * @property mixed original_name
 * @property mixed created_at
 * @property mixed updated_at
 * @property mixed url
 * @property mixed thumbnail_url
 */
class Image extends Model
{
    protected $appends = ['url', 'thumbnail_url'];
    protected $guarded = ['id'];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function getUrlAttribute()
    {
        return url($this->path);
    }

    public function getThumbnailUrlAttribute()
    {
        return url($this->thumbnail);
    }

}
