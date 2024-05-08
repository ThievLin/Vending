<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Expense::all();
        return view('contents/expenseCat', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Expense::all();
        return view('contents/create/create_expeneCat');
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
            'prices' => 'required|int',
        ], [
            'type.required' => 'Please inpute Type',
            'prices.required' => 'Please inpute Price',
        ]);

        Expense::create($validatedData);

        return redirect('expense-cat')->with('flash_message', 'expense Category Create ated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Expense::findOrFail($id);
        return view('contents/update/edit_expenseCat', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense,$id)
    {
        $validatedData = $request->validate([
            'type' => 'required|string',
            'prices' => 'required|int',
        ], [
            'type.required' => 'Please input type',
            'prices.required' => 'Please input price',

        ]);

        // Find the product by ID
        $incoeCat = Expense::find($id);

        $incoeCat->type = $validatedData['type'];
        $incoeCat->prices = $validatedData['prices'];
        $incoeCat->update();

        return redirect('/expense-cat')->with('flash_message', 'Expense categories Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expense::destroy($id);
        return redirect('/expense-cat')->with('flash_message', 'incomeCagegory deleted!');
    }
}
