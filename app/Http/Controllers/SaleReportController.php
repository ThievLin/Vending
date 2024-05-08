<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\SaleReport;
use App\Models\Slot;
use App\Repositories\Patients\PatientRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $RepositoryPatient;
    public function __construct(PatientRepository $RepositoryPatient)
    {
        $this->PatientRepository = $RepositoryPatient;
    }
    public function index()
    {
        $data = Inventory::all();

        return view('contents/saleReport', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SaleReport  $saleReport
     * @return \Illuminate\Http\Response
     */
    public function show(SaleReport $saleReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SaleReport  $saleReport
     * @return \Illuminate\Http\Response
     */
    public function edit(SaleReport $saleReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SaleReport  $saleReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SaleReport $saleReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SaleReport  $saleReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(SaleReport $saleReport)
    {
        //
    }
}
