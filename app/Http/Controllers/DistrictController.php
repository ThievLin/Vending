<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\DistrictResource;
use App\Repositories\Districts\DistrictRepository;

class DistrictController extends Controller
{
    private $RepositoryDistrict;

    public function __construct(DistrictRepository $RepositoryDistrict)
    {
        $this->DistrictRepository = $RepositoryDistrict;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id, $type = 'api')
    {
        $Districts = District::where('province_id', $id)->first();
        if (!$Districts) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'code' => 404,
                    'message' => 'Districts not found'
                ],
            ]);
        }
        $list =  $this->DistrictRepository->getData($id, $type);
        return response()->json([
            'message' => true,
            'httpCode' => Response::HTTP_OK,
            'data' => $list
        ]);
    }
}
