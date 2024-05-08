<?php

namespace App\Repositories\Villages;

use App\Models\Village;
use Illuminate\Support\Facades\DB;

class VillageRepository
{

    public function getData($id, $type)
    {
        if ($type === 'web') {
            $village = Village::select('id', 'name_en', 'name_en')->where('commune_id', $id)->get();
        } else {
            $village = Village::select('name_en', 'name_en')->where('commune_id', $id)->get();
        }
        return $village;
    }
}
