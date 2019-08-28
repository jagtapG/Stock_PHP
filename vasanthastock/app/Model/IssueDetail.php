<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class IssueDetail extends Model
{
    protected $fillable = ['material_id', 'material_date', 'issue_place', 'villa_number',
    						'uom', 'type', 'stock', 'add_quantity', 'subtract_quantity',
    						'vehicle_no', 'alert_Quantity'
                          ];
}
