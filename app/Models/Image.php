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
 */
class Image extends Model
{

    public function imageable()
    {
        return $this->morphTo();
    }

}
