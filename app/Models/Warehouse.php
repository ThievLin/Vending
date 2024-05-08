<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;
    protected $table = 'tab_warehouse';

    protected $fillable = [
        'id',
        'warehouse_name',
        'location',
        'province',
        'districts',
        'communes',
        'villages'
    ];
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
