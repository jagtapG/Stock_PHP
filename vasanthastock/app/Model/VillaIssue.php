<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VillaIssue extends Model
{
    protected $fillable = ['villano', 'qtyv', 'uom', 'issue_date', 'sub_store_id'];
}
