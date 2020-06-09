<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceTable
 * @package App\Models
 * @property mixed id
 * @property mixed code
 * @property mixed description
 * @property mixed service_table_status_id
 * @property mixed created_at
 * @property mixed updated_at
 */
class ServiceTable extends Model
{
    public function serviceTableStatus()
    {
        return $this->belongsTo(ServiceTableStatus::class);
    }
}
