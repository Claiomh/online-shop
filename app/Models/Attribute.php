<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = [
        'product_id',
        'title',
    ];

    use HasFactory;

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function values()
    {
        return $this->hasMany(AttributeValue::class);
    }
}
