<?php

namespace App\Http\Controllers;

use App\Models\Supp;
use Illuminate\Http\Request;

class SuppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Supp::all();
        return view('contents/supp', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $supp = Supp::all();
        return view('contents/create/create_supp', compact('supp'));
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
            'supp_name' => 'required|string',
            'province' => 'required|string',
            'districts' => 'required|string',
            'communes' => 'required|string',
            'villages' => 'required|string',

        ], [
            'supp_name.required' => 'Please input supp',
            'province.required' => 'Please select province',
            'districts.required' => 'Please select districts',
            'communes.required' => 'Please select communes',
            'villages.required' => 'Please select villages',

        ]);

        Supp::create($validatedData);

        return redirect('/supp')->with('success', 'Supp data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supp  $supp
     * @return \Illuminate\Http\Response
     */
    public function show(Supp $supp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supp  $supp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Supp::findOrFail($id);
        return view('contents/update/edit_supp', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supp  $supp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'supp_name' => 'required|string',
            'province' => 'required|string',
            'districts' => 'required|string',
            'communes' => 'required|string',
            'villages' => 'required|string',
        ], [
            'supp_name.required' => 'Please input Name',
            'province.required' => 'Please select province',
            'districts.required' => 'Please select districts',
            'communes.required' => 'Please select communes',
            'villages.required' => 'Please select villages',
        ]);
        $supp = Supp::find($id);
        $supp->supp_name = $validatedData['supp_name'];
        $supp->province = $validatedData['province'];
        $supp->districts = $validatedData['districts'];
        $supp->communes = $validatedData['communes'];
        $supp->villages = $validatedData['villages'];
        $supp->save();

        return redirect('supp')->with('flash_message', 'Machine Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supp  $supp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supp::destroy($id);
        return redirect('supp')->with('flash_message', 'Machine deleted!');
    }
}
