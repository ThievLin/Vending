<?php

namespace App\Repositories\Communes;

use App\Models\Commune;
use Illuminate\Support\Facades\DB;


class CommuneRepository
{

    public function getData($id, $type)
    {
        if ($type === 'web') {
            $commune = Commune::select('id', 'name_en', 'name_en')->where('district_id', $id)->get();
        } else {
            $commune = Commune::select('name_en', 'name_en')->where('district_id', $id)->get();
        }
        return $commune;
    }
}
