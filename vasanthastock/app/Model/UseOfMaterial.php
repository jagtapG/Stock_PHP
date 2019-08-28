<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UseOfMaterial extends Model
{
    protected $fillable = ['mat_use_date', 'qty_req', 'place_of_use','master_mat_id'];
}
