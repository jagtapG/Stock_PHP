<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubStore extends Model
{
    protected $fillable = ['material_id', 'material_date', 'issue_place', 'villa_number',
    						'uom', 'type', 'stock', 'add_quantity', 'subtract_quantity',
    						'alert_Quantity'
                          ];
}
