<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'tab_location';

    protected $fillable = [
        'id',
        'location_name',
        'latitude',
        'logtitude',
        'province', 'districts', 'communes', 'villages', 'company_id', 'company_info_id'
    ];
    public function company()
    {
        return $this->belongsTo(CompanyInfo::class, 'company_info_id', 'id');
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
}
