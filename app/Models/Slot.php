<?php

namespace App\Models;

use App\Models\Inventory;
use App\Models\Machines;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Slot extends Model
{
    use HasFactory;
    protected $table = 'tab_slots';

    protected $fillable = [
        'id',
        'quantity',
        'id_ven_machines',
        'pro_id',
        'slot_num',
        'id_sale_details'

    ];
    //relathionshi[]
    public function machine()
    {
        return $this->belongsTo(Machines::class, 'id_ven_machines');
    }
    public function productRe()
    {
        return $this->belongsTo(Product::class, 'pro_id', 'id');
    }
    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }
    public function saleDetail()
    {
        return $this->belongsTo(SaleDetail::class, 'id_sale_details', 'id');
    }
}
