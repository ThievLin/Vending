<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockproduct extends Model
{
    use HasFactory;
    protected $table = 'tab_stok_product';

    protected $fillable = [
        'id',
        'ware_id',
        'pro_id',
        'totalqty',
        'p_name',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class, 'pro_id');
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'ware_id');
    }
}
