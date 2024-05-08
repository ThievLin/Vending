<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;

class CompanyInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CompanyInfo::with('address')->get();
        return view('contents/company', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        CompanyInfo::all();
        return view('contents/create/create_companyinfo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string',
            'email' => 'required|email',
            'contact' => 'required|string',
            'province' => 'required|string',
            'districts' => 'required|string',
            'communes' => 'required|string',
            'villages' => 'required|string',


        ], [
            'company_name.required' => 'Please input Name',
            'email.required' => 'Please input  email',
            'contact.required' => 'Please input contact',
            'province.required' => 'Please input province',
            'districts.required' => 'Please input districts',
            'communes.required' => 'Please input communes',
            'villages.required' => 'Please input villages',
        ]);
        // Create the company information
        $companyInfo = CompanyInfo::create([
            'company_name' => $validatedData['company_name'],
            'email' => $validatedData['email'],
            'contact' => $validatedData['contact'],
            'province' => $validatedData['province'],
            'districts' => $validatedData['districts'],
            'communes' => $validatedData['communes'],
            'villages' => $validatedData['villages'],
        ]);

        // Create the associated address
        $address = new Address([
            'province' => $validatedData['province'],
            'districts' => $validatedData['districts'],
            'communes' => $validatedData['communes'],
            'villages' => $validatedData['villages'],
        ]);

        $companyInfo->address()->save($address);
        return redirect('/company-info')->with('success', 'Company information data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyInfo $companyInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyInfo $companyInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyInfo $companyInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyInfo  $companyInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CompanyInfo::destroy($id);
        return redirect('/company-info')->with('flash_message', 'Product deleted!');
    }
}
