<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package App\Models
 * @property mixed id
 * @property mixed service_table_id
 * @property mixed item_id
 * @property mixed order_status_id
 * @property array options
 * @property mixed comment
 * @property mixed created_at
 * @property mixed updated_at
 * @property mixed deleted_at
 */
class Order extends Model
{
    protected $casts = [
        'options' => 'array',
    ];
}
