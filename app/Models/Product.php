<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function productGallery() {
        return $this->hasMany(ProductGallery::class, 'product_id');

    }

    public function productSizes() : HasMany {
        return $this->hasMany(ProductSize::class);
    }

    public function productOptions() : HasMany {
        return $this->hasMany(productOption::class);
    }
}
