<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'price',
        'image',
        'user_id',
        'cat_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    /*
    
    hasOne()

    hasMany()
    belongsTo()

    belongsToMany()
    
    */
}
