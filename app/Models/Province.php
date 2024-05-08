<?php

namespace App\Models;

use App\Models\District;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_id',
        'label',
        'prefix',
        'name_en',
        'name_kh',
        'status',
        'start_date',
        'end_date',
        'created_at',
        'created_by',
        'updated_at',
        'updated_by',
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function district(): HasMany
    {
        return $this->hasMany(District::class);
    }
    public function machines()
    {
        return $this->hasMany(Machines::class);
    }
    public function companyinfo()
    {
        return $this->hasMany(CompanyInfo::class);
    }
}
