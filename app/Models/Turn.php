<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'city_id', 'site_id', 'local_ip'];

    // Relación uno a muchos (Turn -> user)
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relación uno a muchos (Turn -> City)
    public function city(){
        return $this->belongsTo(City::class);
    }

    // Relación uno a muchos (Turn -> Site)
    public function site(){
        return $this->belongsTo(Site::class);
    }
}
