<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IncomeCategory extends Model
{
    use HasFactory;
    protected $table = 'tab_income_categories';

    protected $fillable = [
        'type',
        'price',

    ];
    public function incomeList(): HasMany
    {
        return $this->hasMany(IncomeList::class);
    }
}
