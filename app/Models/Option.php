<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Option
 * @package App\Models
 * @property mixed id
 * @property mixed price
 * @property mixed name
 * @property mixed option_group_id
 * @property mixed created_at
 * @property mixed updated_at
 * @property OptionGroup optionGroup
 */
class Option extends Model
{
    public function optionGroup()
    {
        return $this->belongsTo(OptionGroup::class);
    }

}
