<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'country_id'];

    public function getRouteKeyName(){
        return "slug";
    }

    // Una ciudad pertenece a un país.
    public function country(){
        return $this->belongsTo(Country::class);
    }

    // Relación de uno a uno -> Una sede tiene una ciudad
    public function site(){
        return $this->hasOne(Site::class);
    }

    // Relación de uno a uno -> Un turno tiene una ciudad.
    public function turn(){
        return $this->hasOne(Turn::class);
    }

    // Relación de uno a muchos -> Una ciudad tiene muchas Reinstalaciones.
    public function reinstallations(){
        return $this->hasMany(Reinstallation::class);
    }

}
