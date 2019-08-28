<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = ['place_of_issue', 'qty', 'altqty', 'issue_date', 
                           'central_store_id', 'villano', 'meter_val', 'total_meter',
                           'issue_meter_val', 'sub_uom', 'date', 'sub_init_qty', 'material_id'
                         ];
}
