<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
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
 * @property Category parent
 * @property Category[]|Collection descendants
 * @property Category[]|Collection ancestors
 * @property Image[]|Collection images
 * @property Item[]|Collection items
 */
class Category extends Model
{
    use NodeTrait;

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function getParentIdName()
    {
        return 'category_id';
    }


    public function setCategoryIdAttribute($value)
    {
        $this->setParentIdAttribute($value);
    }

    public function allItems()
    {
        $items = collect();
        foreach ($this->descendants as $descendant) {
            $items = $items->merge($descendant->items);
        }
        return $items->merge($this->items);
    }


}
