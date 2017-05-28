<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'time',
        'day',
        'object_id'
    ];

    public function object() {
    
        return $this->belongsTo(Object::class);
    
    }
}
