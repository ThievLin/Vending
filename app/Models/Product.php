<?php

namespace App\Models;

use App\Models\Pro_category;
use App\Models\Slot;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $table = 'tab_products';

    protected $fillable = [
        'id',
        'p_image',
        'p_name',
        'expiry_date',
        'specific_code',
        'id_pro_categories'
    ];
    public function pro_category()
    {
        return $this->belongsTo(Pro_category::class, 'id_pro_categories', 'id');
    }
    public function slot(): HasMany
    {
        return $this->hasMany(Slot::class);
    }
    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }
    public function producPrice()
    {
        return $this->hasOne(ProducPrice::class);
    }
    //scope
    public function scopeTotalPrice($query)
    {
        return $query->where('m_name', '!=', 'NULL');
    }
}
