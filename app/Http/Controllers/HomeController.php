<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\HomeResource;
use App\Models\Inventory;
use App\Models\Machines;
use App\Models\Reslot;
use App\Repositories\Dashboard\HomeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $homeRepository;


    public function __construct(HomeRepository $homeRepository)
    {
        $this->middleware('auth');
        $this->homeRepository = $homeRepository;
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, Inventory $dataSyncService, Machines $machinesCount, Reslot $transe)
    {
        $resultsApi = $this->homeRepository->getResults();
        $resultsPriceIn = $this->homeRepository->getResultsPriceIn();
        $dataslot = $dataSyncService->syncDataFromApi();
        $machinesByOwner = $this->homeRepository->getMachin($machinesCount);
        $getTransection = $this->homeRepository->getTransection($transe);
        $data = Inventory::with('product')->with('saleDetail')->get();
        $results = Reslot::all();
        return view('home', compact('machinesByOwner', 'data', 'dataslot', 'results', 'resultsPriceIn', 'getTransection', 'resultsApi'));
    }
}
