<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName(){
        return "slug";
    }

    // Relación muchos a muchos Country
    public function countries(){
        return $this->belongsToMany(Country::class);
    }

    // Relación uno a muchos inversa (City <- Headquarter)
    public function site(){
        return $this->hasMany(Site::class);
    }

    // Relación uno a muchos (city -> turn)
    public function turn(){
        return $this->belongsTo(Turn::class);
    }

    
}
