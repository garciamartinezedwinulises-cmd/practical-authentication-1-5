<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    // Relación: Una categoría tiene muchos posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
