<?php

namespace App\Models;

use App\Models\Commune;
use App\Models\District;
use App\Models\IncomeList;
use App\Models\Province;
use App\Models\Slot;
use App\Models\Village;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class Machines extends Model
{
    use HasFactory;
    protected $table = 'tab_vending_machines';

    protected $fillable = [
        'm_name',
        'address',
        'installation_date',
        'expiry_date',
        'm_image',
        'slot',
        'province',
        'districts',
        'communes',
        'villages'
    ];

    //relationship
    public function slot()
    {
        return $this->hasOne(Slot::class, 'id_ven_machines');
    }
    public function villageRe()
    {
        return $this->belongsTo(Village::class, 'villages', 'id');
    }
    public function communeRe()
    {
        return $this->belongsTo(Commune::class, 'communes', 'id');
    }
    public function districtsRe()
    {
        return $this->belongsTo(District::class, 'districts', 'id');
    }
    public function provinceRe()
    {
        return $this->belongsTo(Province::class, 'province', 'id');
    }
    public function incomeList(): HasMany
    {
        return $this->hasMany(IncomeList::class);
    }
    public function expenseList(): HasMany
    {
        return $this->hasMany(ExpenseList::class);
    }
}
