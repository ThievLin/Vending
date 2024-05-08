<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Reslot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReslotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $response = Http::get('api.bsi-kh.com', ['cache' => 0]);

            if ($response->successful()) {
                $dataslot = $response->json();
                foreach ($dataslot as $slot) {
                    Reslot::updateOrCreate(
                        [
                            'id_slots' => $slot['id'],
                        ],
                        [
                            'slot' => isset($slot['slot']) ? $slot['slot'] : null,
                            'date' => isset($slot['date']) ? $slot['date'] : null,
                            'address' => isset($slot['adddress']) ? $slot['address'] : null,
                            'location' => isset($slot['location']) ? $slot['location'] : null,
                        ]
                    );
                }
                return $dataslot; // Return the synchronize data
            } else {
                $statusCode = $response->status();
                $errorMessage = $response->body();
                throw new \Exception($errorMessage, $statusCode);
            }
        } catch (\Exception $e) {
            return [];
        }
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
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reslot  $reslot
     * @return \Illuminate\Http\Response
     */
    public function show(Reslot $reslot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reslot  $reslot
     * @return \Illuminate\Http\Response
     */
    public function edit(Reslot $reslot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reslot  $reslot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reslot $reslot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reslot  $reslot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reslot $reslot)
    {
        //
    }
}