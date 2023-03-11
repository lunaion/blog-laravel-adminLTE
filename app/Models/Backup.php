<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function getRouteKeyName(){
        return "slug";
    }

    // Relación muchos a muchos -> Un backup tiene muchas reinstalaciones
    public function reinstallations(){
        return $this->belongsToMany(Reinstallation::class);
    }
}
