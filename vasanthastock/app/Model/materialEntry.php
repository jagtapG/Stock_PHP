<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class materialEntry extends Model
{
    protected $fillable = [
                            'mat_id', 'mat_po_txt', 'material','material_desc', 
                            'mat_crtd_dt', 'st_bin','mtype', 'bun', 
                            'old_material', 'matl_group', 'st_loc', 'prod_hierarchy',
                            'prod_hierarchy_desc', 'plant_id', 'Mov_avg_price', 'stock',
                            'plant','mat_name','stock_alert', 'gross', 'tare', 'netweight', 'uom', 'vehicleno', 'quantity', 'store', 'date','init_qty', 'mat_loc', 'receive_quantity', 'total_quantity', 'current_quantity'
                          ];
}
