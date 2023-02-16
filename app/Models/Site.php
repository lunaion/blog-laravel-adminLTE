<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'address', 'phone', 'email', 'city_id', 'user_id'];

    public function getRouteKeyName(){
        return "slug";
    }

    // Relación uno a muchos (site -> City)
    public function city(){
        return $this->belongsTo(City::class);
    }

    // Relación uno a muchos (site -> user)
    public function user(){
        return $this->belongsTo(User::class);
    }
}
