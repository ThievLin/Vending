<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeList extends Model
{
    use HasFactory;
    protected $table = 'tab_incomes';

    protected $fillable = [
        'description',
        'id_income_categories',
        'id_vending_machine'

    ];
    //relatuonship
    public function incom_category()
    {
        return $this->belongsTo(IncomeCategory::class, 'id_income_categories', 'id');
    }
    public function machin()
    {
        return $this->belongsTo(Machines::class, 'id_vending_machine', 'id');
    }
}
