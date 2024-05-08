<?php

namespace App\Models;

use App\Models\Commune;
use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class District extends Model
{
    use HasFactory;
    protected $fillable = [
        "ref_id",
        "label",
        "prefix",
        "name_en",
        "name_en",
        "province_id",
        "status",
        "start_date",
        "end_date",
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

    public function commune(): HasMany
    {
        return $this->hasMany(Commune::class);
    }

    public function provinces()
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
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
