<?php

namespace App\Http\Controllers;

use App\Models\province;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProvinceResource;
use App\Repositories\Provinces\ProvinceRepository;

class ProvinceController extends Controller
{

    private $c;

    public function __construct(ProvinceRepository $Repositoryprovince)
    {
        $this->ProvinceRepository = $Repositoryprovince;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($type = 'api')
    {
        $list =  $this->ProvinceRepository->getData($type);
        return response()->json([
            'message' => true,
            'httpCode' => Response::HTTP_OK,
            'data' => $list
        ]);
    }
}
