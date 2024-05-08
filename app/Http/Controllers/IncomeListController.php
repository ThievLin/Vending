<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use App\Models\IncomeList;
use App\Models\Machines;
use Illuminate\Http\Request;

class IncomeListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = IncomeList::all();
        return view('contents/income', compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $machin = Machines::all();
        $incomCa = IncomeCategory::all();
        IncomeList::all();
        return view('contents/create/create_incomList', compact('incomCa', 'machin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'description' => 'required|string',
                'id_income_categories' => 'required|int',
                'id_vending_machine' => 'required|int',
            ]
        );

        IncomeList::create($validatedData);

        return redirect('incomelist')->with('flash_message', 'Income create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncomeList  $incomeList
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeList $incomeList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncomeList  $incomeList
     * @return \Illuminate\Http\Response
     */
    public function edit(IncomeList $incomeList, $id)
    {
        //edit_incomeList.blade
        $machin = Machines::all();
        $incomCa = IncomeCategory::all();
        $data = IncomeList::findOrFail($id);
        return view('contents/update/edit_incomeList', compact('data','incomCa','machin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncomeList  $incomeList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'description' => 'required|string',
            'id_income_categories' => 'required|int',
            'id_vending_machine' => 'required|int',
        ]);

        // Find the product by ID
        $incoeCat = IncomeList::find($id);

        $incoeCat->description = $validatedData['description'];
        $incoeCat->id_income_categories = $validatedData['id_income_categories'];
        $incoeCat->id_vending_machine = $validatedData['id_vending_machine'];
        $incoeCat->update();

        return redirect('/incomelist')->with('flash_message', 'Incomelist Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncomeList  $incomeList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        IncomeList::destroy($id);
        return redirect('/incomelist')->with('flash_message', 'incomeList deleted!');
    }
}
