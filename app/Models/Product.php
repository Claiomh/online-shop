<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'slug',
        'description',
        'image',
        'price',
        'quantity',
        'published'
    ];
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function attributes() {
        return $this->belongsToMany(Attribute::class)->withPivot('product_attribute');
    }

}
