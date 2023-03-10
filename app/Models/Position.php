<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName(){
        return "slug";
    }

    // Relación de uno a muchos -> Una cargo tiene muchas Reinstalaciones.
    public function reinstallations(){
        return $this->hasMany(Reinstallation::class);
    }
}
