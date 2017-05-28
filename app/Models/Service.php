<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'type'
    ];

    public function objects() {
    
        return $this->belongsToMany(Object::class, 'services_objects')->withPivot(['class', 'price']);
    
    }

    public static function getTypes() {
    
        return [
            'basic',
            'additional',
            'custom'
        ];
    
    }
}
