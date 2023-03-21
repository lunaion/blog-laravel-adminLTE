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

    // Una reinstalación pertenece a un usuario.
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    // Una reinstalación pertenece a una area.
    public function area(){
        return $this->belongsTo(Area::class);
    }

    // Una reinstalación pertenece a un cargo.
    public function position(){
        return $this->belongsTo(Position::class);
    }

    // Una reinstalación pertenece a una ciudad.
    public function city(){
        return $this->belongsTo(City::class);
    }

    // Una reinstalación pertenece a una sede.
    public function site(){
        return $this->belongsTo(Site::class);
    }

    // Relación muchos a muchos -> Una reinstalación tiene muchos Backups
    public function backups(){
        return $this->belongsToMany(Backup::class);
    }

    // Relación muchos a muchos -> Una reinstalación tiene muchas activaciones de licencias.
    public function licenseActivations(){
        return $this->belongsToMany(LicenseActivation::class);
    }

    // Relación muchos a muchos -> Una reinstalación tiene muchas validaciones generales.
    public function generalValidations(){
        return $this->belongsToMany(GeneralValidation::class);
    }
}
