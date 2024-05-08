<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseList;
use App\Models\Machines;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ExpenseListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ExpenseList::all();
        return view('contents/expeneList', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $machin = Machines::all();
        $expense = Expense::all();
        return view('contents/create/create_expenseList', compact('expense', 'machin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate(
            [
                'description' => 'required|string',
                'id_expense_categories' => 'required|int',
                'id_vending_machine' => 'required|int',
            ]
        );

        ExpenseList::create($validatedData);

        return redirect('expense-list')->with('flash_message', 'Expense create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseList  $expenseList
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseList $expenseList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseList  $expenseList
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $machin = Machines::all();
        $expense = Expense::all();
        $data = ExpenseList::findOrFail($id);
        return view('contents/update/edit_expenseList', compact('expense', 'machin', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenseList  $expenseList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'description' => 'required|string',
            'id_expense_categories' => 'required|int',
            'id_vending_machine' => 'required|int',
        ]);

        // Find the product by ID
        $incoeCat = ExpenseList::find($id);

        $incoeCat->description = $validatedData['description'];
        $incoeCat->id_expense_categories = $validatedData['id_expense_categories'];
        $incoeCat->id_vending_machine = $validatedData['id_vending_machine'];
        $incoeCat->update();

        return redirect('/expense-list')->with('flash_message', 'Expense List Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseList  $expenseList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExpenseList::destroy($id);
        return redirect('/expense-list')->with('flash_message', 'Expense list deleted!');
    }
}
