<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName(){
        return "slug";
    }

    // Relación muchos a muchos con City
    public function cities(){
        return $this->belongsToMany(City::class);
    }
}
