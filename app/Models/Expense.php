<?php

namespace App\Models;

use App\Models\ExpenseList;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'tab_expense_categories';

    protected $fillable = [
        'type',
        'prices',
    ];
    public function expenseList(): HasMany
    {
        return $this->hasMany(ExpenseList::class);
    }
}
