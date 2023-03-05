<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'city_id', 'site_id', 'local_ip', 'status', 'date', 'time'];

    // Un usuario pertenece a un turno
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Una ciudad pertenece a unb turno.
    public function city(){
        return $this->belongsTo(City::class);
    }

    // Una sede pertence a un turno.
    public function site(){
        return $this->belongsTo(Site::class);
    }
}
