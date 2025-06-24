<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use Illuminate\Http\Request;
use App\Models\Habit_List;
use App\Models\User;

class HabitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Habit $habit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Habit $habit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Habit $habit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        //
    }

    public function addHabitToList(Request $request){
    // Validar la solicitud
    // dd($request->all()); //output del ejemplo -> quantity: 11 / id_habit: 1
    $datos = $request->all();
    $request->validate([
        'id_habit' => 'required|exists:habits,id',
        'quantity' => 'required|numeric',
    ]);

    // Obtener el ID del hábito y el usuario actual
    $habitId = $datos['id_habit'];
    $userId = auth()->user()->id;
    $quantity = $datos['quantity'];
    $quantity_start = 0;
    // dd("comprobacion -> habito", $habitId, " quantity ->", $quantity," usuario -> ", $userId); // -> funciona :)


    // Verificar si el hábito ya está en la lista
    if (!$this->habitAlreadyAdded($userId, $habitId)) {
        // Agregar el hábito a la lista
        $habit_list = Habit_List::create([
            'user_id' => $userId,
            'id_habit' => $habitId,
            'quantity_start' => $quantity_start,
            'quantity_end' => $quantity ,
        ]);
        $habit_list->save();
        // return redirect()->back()->with('success', 'Hábito añadido con éxito.');
    }
    return response()->json(["success" => "Se ha actualizado tu habito"]);
}


private function habitAlreadyAdded($userId, $habitId)
{
    return Habit_List::where('user_id', $userId)
        ->where('id_habit', $habitId)
        ->exists();
}
}
