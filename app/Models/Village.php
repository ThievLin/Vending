<?php

namespace App\Models;

use App\Models\Commune;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Village extends Model
{
    use HasFactory;
    protected $fillable = [
        "ref_id",
        "label",
        "name_en",
        "name_kh",
        "commune_id",
        "hc_code",
        "status",
        "start_date",
        "end_date",
        "household",
        "population",
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

    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
    public function communes()
    {
        return $this->belongsTo(Commune::class, 'commune_id', 'id');
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
