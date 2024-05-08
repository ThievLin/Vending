<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseList extends Model
{
    use HasFactory;
    protected $table = 'tab_expenses';

    protected $fillable = [
        'description',
        'id_expense_categories',
        'id_vending_machine'

    ];
    //relatuonship
    public function expense_category()
    {
        return $this->belongsTo(Expense::class, 'id_expense_categories', 'id');
    }
    public function machin()
    {
        return $this->belongsTo(Machines::class, 'id_vending_machine', 'id');
    }
}
