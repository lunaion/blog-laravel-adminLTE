<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpiredTicket extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Un ticket vencido pertenece a un usuario asignador.
    public function asignado(){
        return $this->belongsTo(User::class, 'asignado_por');
    }

    // Un ticket vencido pertenece a un usuario en sede.
    public function tecnico(){
        return $this->belongsTo(User::class, 'tecnico_sede');
    }

    // Un ticket vencido pertenece a una sede.
    public function site(){
        return $this->belongsTo(Site::class);
    }

    // Un ticket vencido pertenece a una area.
    public function area(){
        return $this->belongsTo(Area::class, 'area_asignadora');
    }
}
