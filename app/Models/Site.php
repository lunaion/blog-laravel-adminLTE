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

    // Una ciudad pertenece a una sede.
    public function city(){
        return $this->belongsTo(City::class);
    }

    // Una sede pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relación de uno a uno -> Un turno pertenece a una sede.
    public function turn(){
        return $this->hasOne(Turn::class);
    }

    // Relación de uno a muchos -> Una sede tiene muchas Reinstalaciones.
    public function reinstallations(){
        return $this->hasMany(Reinstallation::class);
    }
}
