<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supp extends Model
{
    use HasFactory;
    protected $table = 'tab_supp';

    protected $fillable = [
        'id',
        'supp_name',
        'location',
        'province',
        'districts',
        'communes',
        'villages'
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
}
