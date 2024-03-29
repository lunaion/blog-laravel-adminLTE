<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName(){
        return "slug";
    }

    // Relación de uno a muchos -> Una área tiene muchas Reinstalaciones.
    public function reinstallations(){
        return $this->hasMany(Reinstallation::class);
    }

    // Relación de uno a muchos -> Un área tiene muchos tickets vencidos.
    public function expired_tickets(){
        return $this->hasMany(ExpiredTicket::class);
    }

}
