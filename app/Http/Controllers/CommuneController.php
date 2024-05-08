<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommuneResource;
use App\Repositories\Communes\CommuneRepository;

class CommuneController extends Controller
{
    private $RepositoryCommune;

    public function __construct(CommuneRepository $RepositoryCommune)
    {
        $this->CommuneRepository = $RepositoryCommune;
    }
    /**
     * Display a listing of the resource.
     */
    public function index($id, $type = 'api')
    {
        $Communes = Commune::where('district_id', $id)->first();
        if (!$Communes) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'code' => 404,
                    'message' => 'Communes not found'
                ],
            ]);
        }
        $list =  $this->CommuneRepository->getData($id, $type);
        return response()->json([
            'message' => true,
            'httpCode' => Response::HTTP_OK,
            'data' => $list
        ]);
    }
}
