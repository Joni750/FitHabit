<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("restaurant.index");
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //dd("tamo llegando?");

        try {
            // Your existing logic here
            //dd($data = $request->all());
            $data = $request->all();
            $fechaReserva = $data["fechaReserva"];
            $horaReserva = $data["horaReserva"];
            $personas = $data["personaReserva"];
            $user_id = auth()->user()->id;

            DB::insert('insert into reservations (date, time, people, user_id) values (STR_TO_DATE( ? , "%d-%m-%Y"), ?, ?, ?)', [$fechaReserva, $horaReserva ,$personas, $user_id]);

            return response()->json(['message' => 'Reserva creada exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
