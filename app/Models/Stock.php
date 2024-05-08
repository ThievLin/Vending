<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Supp;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'tab_stock';

    protected $fillable = [
        // 'id',
        'supp_name',
        // 'location',
        'qty',
        'price',
        'subtotal',
        'uom',
        'pro_id',
        'supp_id',
        'received_date',
        'source',
        'ware_id',
        'totalqty',
        'totalqty2'


    ];
    public function supp()
    {
        return $this->belongsTo(Supp::class, 'supp_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'pro_id');
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'ware_id');
    }
}
