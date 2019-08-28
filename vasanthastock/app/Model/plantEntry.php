<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class plantEntry extends Model
{
    protected $fillable = [
    						'plant_id', 'plant_desc', 'plant_code', 'plant_address', 
    						'plant_contact', 'chief_email', 'plant_state', 'plant_pincode',
    						'contactName1', 'contactPhone1', 'contactEmail1', 'contactName2',
    						'contactPhone2', 'contactEmail2'
    					  ];
}
