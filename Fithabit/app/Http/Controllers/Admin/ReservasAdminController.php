<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Validator;

class ReservasAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();

        return view("admin.reservations.index", ["reservations"=>$reservations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.reservations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservationData = $request->except('_token');

        $validator = Validator::make($reservationData, [
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'people' => 'required|integer|min:1',
            'user_id' => 'required|exists:users,id',
        ], [
            'date.required' => 'La fecha es obligatoria.',
            'time.required' => 'La hora es obligatoria.',
            'time.date_format' => 'El formato de la hora debe ser HH:mm.',
            'people.required' => 'El número de personas es obligatorio.',
            'people.integer' => 'El número de personas debe ser un número entero.',
            'people.min' => 'El número de personas debe ser al menos 1.',
            'user_id.required' => 'El ID del usuario es obligatorio.',
            'user_id.exists' => 'El ID del usuario no es válido.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // Lógica para guardar la reserva si la validación pasa
        Reservation::create($reservationData);

        return redirect()->route('reservas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $reservations = Reservation::find($id);

        $reservations->delete();

        return back();
    }
}
