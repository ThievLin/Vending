<?php

namespace App\Http\Controllers;

use App\Models\Machines;
use Illuminate\Http\Request;

class MachinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Machines::all();

        return view('contents/vending_machines', compact('data',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Machines::all();
        return view('contents/create/create_machine', compact('data'));
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
        $validatedData = $request->validate([
            'm_name' => 'required|string',
            'installation_date' => 'required|date',
            'expiry_date' => 'required|date',
            'm_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
            'slot' => 'required|int',
            'province' => 'required|string',
            'districts' => 'required|string',
            'communes' => 'required|string',
            'villages' => 'required|string',

        ], [
            'm_name.required' => 'Please input Name',
            'installation_date.required' => 'Please input Installation date',
            'expiry_date.required' => 'Please input Expired Date',
            'm_image.required' => 'Please input an image',
            'm_image.image' => 'The uploaded file must be an image',
            'm_image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif',
            'm_image.max' => 'The image must have a maximum size of 1MB', // Custom message for maximum size validation
            'slot.required' => 'Please input Slot',
            'province.required' => 'Please select province',
            'districts.required' => 'Please select districts',
            'communes.required' => 'Please select communes',
            'villages.required' => 'Please select villages',
        ]);
        if ($request->hasFile('m_image')) {
            $image = $request->file('m_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $imageName);
            $validatedData['m_image'] = 'images/' . $imageName; // Store the path relative to the public directory
        }

        Machines::create($validatedData);

        return redirect('/vending_machines')->with('success', 'Machine data has been saved successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Machines::findOrFail($id);
        return view('contents/show/show_machines', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function edit(Machines $machines, $id)
    {
        //
        $data = Machines::findOrFail($id);
        return view('contents/update/edit_machine', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'm_name' => 'required|string',
            'address' => 'required|string',
            'installation_date' => 'required|date',
            'expiry_date' => 'required|date',
            'slot' => 'required|int',
            'province' => 'required|string',
            'districts' => 'required|string',
            'communes' => 'required|string',
            'villages' => 'required|string',
        ], [
            'm_name.required' => 'Please input Name',
            // 'address.required' => 'Please input Address',
            'installation_date.required' => 'Please input Installation date',
            'expiry_date.required' => 'Please input Expired Date',
            'slot.required' => 'Please input Slot',
            'province.required' => 'Please select province',
            'districts.required' => 'Please select districts',
            'communes.required' => 'Please select communes',
            'villages.required' => 'Please select villages',
        ]);
        $machine = Machines::find($id);
        $machine->m_name = $validatedData['m_name'];
        // $machine->address = $validatedData['address'];
        $machine->installation_date = $validatedData['installation_date'];
        $machine->expiry_date = $validatedData['expiry_date'];
        $machine->slot = $validatedData['slot'];
        $machine->province = $validatedData['province'];
        $machine->districts = $validatedData['districts'];
        $machine->communes = $validatedData['communes'];
        $machine->villages = $validatedData['villages'];
        $machine->save();

        return redirect('vending_machines')->with('flash_message', 'Machine Updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Machines  $machines
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Machines::destroy($id);
        return redirect('vending_machines')->with('flash_message', 'Machine deleted!');
    }
}