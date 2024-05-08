<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProducPrice extends Model
{
    use HasFactory;
    protected $table = 'tab_product_prices';

    protected $fillable = [
        'id',
        'product_id',
        'price_in',
        'price_out',
        'id_pro_season',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
