<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

     /**
     * @var array
     */
    protected $fillable = [
        'sku', 'name', 'slug', 'caracteristique', 'description', 'quantity',
        'stock', 'price', 'sale_price', 'status', 'featured',  'product_image', 
        'is_new', 'thumbnail_image', 'min_quantity', 'poids', 'product_video', 'category_id'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'quantity'  =>  'integer',
        'brand_id'  =>  'integer',
        'status'    =>  'boolean',
        'featured'  =>  'boolean',
        'price'     =>  'integer',
        'sale_price' => 'integer',
        'stock' => 'integer',
        'is_new' => 'boolean'
       
    ];

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product', 'product_id', 'order_id')
                    ->withPivot('quantity', 'total_price', 'product_price');
    }
}
