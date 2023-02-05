<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relación uno a muchos inversa (User <- Posts)
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Relación uno a muchos inversa (Category <- Posts)
    public function category(){
        return $this->belongsTo(Category::class);
    }

    // Relación muchos a muchos (Posts <-> Categories)
    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    // Relación uno a uno polimórfica (Post -> Image)
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
