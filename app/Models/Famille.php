<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Famille extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'image', 'slug', 'status'
    ];

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function products()
    {
        return $this->hasManyThrough(
            Product::class, 
            Category::class,
            'parent_id',
            'category_id',
            'id',
            'id'
        );
    }
}
