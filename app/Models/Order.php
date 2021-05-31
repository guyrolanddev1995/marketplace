<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'user_id', 'amount', 'nom', 'prenom', 'phone1',
        'adresse', 'pays_id', 'ville', 'status', 'transporteur_id',
        'code_postal', 'frais_livraison', 'currency'
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')
                    ->withPivot('quantity', 'total_price','product_price');
    }

    public function trackings()
    {
        return $this->hasMany(Tracking::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'pays_id', 'id');
    }

    public function transporteur()
    {
        return $this->belongsTo(Transporteur::class, 'transporteur_id', 'id');
    }

    public function devise()
    {
        return $this->belongsTo(Currency::class, 'devise_id', 'id');
    }
}
