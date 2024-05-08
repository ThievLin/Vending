<?php

namespace App\Models;

use App\Models\Village;
use App\Models\District;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commune extends Model
{
    use HasFactory;
    protected $fillable = [
        "ref_id",
        "label",
        "prefix",
        "name_en",
        "name_en",
        "district_id",
        "start_date",
        "end_date",
        "status",
        "created_at",
        "created_by",
        "updated_at",
        "updated_by"
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function village()
    {
        return $this->hasMany(Village::class);
    }

    public function districts()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
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
