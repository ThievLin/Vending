<?php

namespace App\Models;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reslot extends Model
{
    use HasFactory;
    protected $table = 'tab_product_slot';

    protected $fillable = [
        'slot',
        'date',
        'adddress',
        'location',
        'quantity_add',
        'inventory_id'

    ];
    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }
}
