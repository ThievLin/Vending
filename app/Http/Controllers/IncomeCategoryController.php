<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\IncomeCategory;
use App\Models\Pro_category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class IncomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = IncomeCategory::all();
        return view('contents/incomeCagegory', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        IncomeCategory::all();
        return view('contents/create/create_incomecate');
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
            'type' => 'required|string',
            'price' => 'required|int',
        ], [
            'type.required' => 'Please inpute Type',
            'price.required' => 'Please inpute Price',
        ]);

        IncomeCategory::create($validatedData);

        return redirect('incomecategory')->with('flash_message', 'Incom Category Updated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomeCategory  $incomeCategory
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeCategory $incomeCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncomeCategory  $incomeCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = IncomeCategory::findOrFail($id);
        return view('contents/update/edit_incomecategory', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncomeCategory  $incomeCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomeCategory $product, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'type' => 'required|string',
            'price' => 'required|int',
        ], [
            'type.required' => 'Please input type',
            'price.required' => 'Please input price',

        ]);

        // Find the product by ID
        $incoeCat = IncomeCategory::find($id);

        $incoeCat->type = $validatedData['type'];
        $incoeCat->price = $validatedData['price'];
        $incoeCat->update();

        return redirect('/incomecategory')->with('flash_message', 'Incomcategory Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomeCategory  $incomeCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        IncomeCategory::destroy($id);
        return redirect('/incomecategory')->with('flash_message', 'incomeCagegory deleted!');
    }
}
