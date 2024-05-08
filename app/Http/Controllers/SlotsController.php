<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Machines;
use App\Models\Product;
use App\Models\Slot;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SlotsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $product_ca = Product::all();
        $machin = Machines::all();
        $data = Slot::all();
        return view('contents/slot', compact('data', 'machin', 'product_ca'));
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
        // Validate the request data
        $validatedData = $request->validate([
            'quantity' => 'required|array',
            'id_ven_machines' => 'required|int',
            'pro_id' => 'required|array',
            'slot_num' => 'required|array',
        ]);

        // Assuming both arrays have the same length
        $quantityArray = $validatedData['quantity'];
        $productIdsArray = $validatedData['pro_id'];
        $slotNumArray = $validatedData['slot_num'];

        // Check if a slot with the given id_ven_machines already exists
        $existingSlot = Slot::where('id_ven_machines', $validatedData['id_ven_machines'])->first();

        if ($existingSlot) {
            throw ValidationException::withMessages(['id_ven_machines' => 'Slot with the given vening machines already exists.']);
        }

        // Create the slot record
        $slot = Slot::create([
            'id_ven_machines' => $validatedData['id_ven_machines'],
        ]);

        foreach ($productIdsArray as $index => $productId) {
            // Check if the productId is empty, and set quantity to null in that case
            $quantity = $productId === '' ? null : $quantityArray[$index];

            // Create the inventory record with the dynamic slot_id and auto-generated slot_num
            $inventoryData = [
                'QTY' => $quantity,
                'pro_id' => $productId,
                'slot_id' => $slot->id, // Associate the inventory record with the slot
                'slot_num' => $slotNumArray[$index], // Assuming slot_num is provided in the request
            ];

            Inventory::create($inventoryData);
        }

        return redirect()->back()->with('success', 'Slot data has been saved successfully.');
    }






    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Slot $slot)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
