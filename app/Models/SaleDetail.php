<?php

namespace App\Models;

use App\Models\IncomeList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SaleDetail extends Model
{
    use HasFactory;
    protected $table = 'tab_sale_details';

    protected $fillable = [
        'quantity',
        'id_vending_machine',
        'id_product_slot',
        'sale_datetime',
        'quantity',
        'price',
        'status'

    ];
    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }
}
