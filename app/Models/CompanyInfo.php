<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;
    protected $table = 'tab_company_information';

    protected $fillable = [
        'company_name',
        'email',
        'contact',
        'address',
        'province',
        'communes',
        'villages',

    ];
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
    public function address()
    {
        return $this->hasMany(Address::class, 'company_info_id');
    }
}
