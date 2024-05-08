<?php

namespace App\Http\Controllers;

use App\Models\village;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\VillageResource;
use App\Repositories\Villages\VillageRepository;

class VillageController extends Controller
{
    private $RepositoryVillage;

    public function __construct(VillageRepository $RepositoryVillage)
    {
        $this->VillageRepository = $RepositoryVillage;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($id, $type = 'api')
    {
        $village = Village::where('commune_id', $id)->first();
        if (!$village) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'code' => 404,
                    'message' => 'villages not found'
                ],
            ]);
        }
        $list = $this->VillageRepository->getData($id, $type);
        return response()->json([
            'message' => true,
            'httpCode' => Response::HTTP_OK,
            'data' => $list
        ]);
    }
}
