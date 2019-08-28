<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AddedStock extends Model
{
    protected $fillable = ['newaddstock', 'prvstock', 'datetime', 'matid', 'matloc'];
}
