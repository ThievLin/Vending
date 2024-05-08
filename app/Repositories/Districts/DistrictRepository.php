<?php

namespace App\Repositories\Districts;

use App\Models\District;
use Illuminate\Support\Facades\DB;


class DistrictRepository
{

    public function getData($id, $type)
    {
        if ($type === 'web') {
            $district = District::select('id', 'name_en', 'name_en')->where('province_id', $id)->get();
        } else {
            $district = District::select('name_en', 'name_en')->where('province_id', $id)->get();
        }
        return $district;
    }
}
