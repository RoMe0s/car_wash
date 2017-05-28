<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicesObject extends Model
{
    protected $fillable = [
        'service_id',
        'object_id',
        'class',
        'price'  
    ];
}
