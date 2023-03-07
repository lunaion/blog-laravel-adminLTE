<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reinstallation extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Una reinstalación pertenece a un usuario.
    public function tecnico(){
        return $this->belongsTo(User::class, 'tecnico_id');
    }
}
