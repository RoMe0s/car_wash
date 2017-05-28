<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Object extends Model
{
    protected $fillable = [
        'type',
        'name',
        'email',
        'phone',
        'city',
        'address',
        'description',
        'image',
        'posts',
        'requisites',
        'location'
    ];

    protected $casts = [
        'location' => 'json'
    ];

    public function services() {
    
        return $this->belongsToMany(Service::class, 'services_objects')->withPivot(['price', 'class']);
    
    }

    public function users() {
    
        return $this->belongsToMany(User::class, 'users_objects');
    
    }

    public function schedules() {
    
        return $this->hasMany(Schedule::class);
    
    }
}
