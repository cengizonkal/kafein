<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


/**
 * Class OptionGroup
 * @package App\Models
 * @property mixed id
 * @property mixed is_multiple
 * @property mixed title
 * @property mixed created_at
 * @property mixed item_id
 * @property mixed updated_at
 * @property Option[]|Collection options
 * @property Item item
 */
class OptionGroup extends Model
{

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
