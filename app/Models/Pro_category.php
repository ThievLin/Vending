<?php

namespace App\Models;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pro_category extends Model
{
    use HasFactory;
    protected $table = 'tab_product_categories';

    protected $fillable = [
        'id',
        'type',
    ];
    //relationship 
    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function saleDetail(): HasMany
    {
        return $this->hasMany(SaleDetail::class);
    }
}
