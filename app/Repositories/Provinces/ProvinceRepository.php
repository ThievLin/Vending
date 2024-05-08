<?php
namespace App\Repositories\Provinces;
use App\Models\Province;
use Illuminate\Support\Facades\DB;


class ProvinceRepository  {

    public function getData($type){
        if ($type === 'web') {
            $province = Province::select('id','name_en','name_en')->get();
        }else {
            $province = Province::select('name_en','name_en')->get();
        }
        return $province;
    }
}
