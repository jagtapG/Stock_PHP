<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MaterialDetail extends Model
{
    protected $fillable = ['material_id', 'material_name', 'material', 'material_description',
    						'material_group', 'material_location', 'material_gross', 'material_tare',
    						'material_netweight'
                          ];
}
