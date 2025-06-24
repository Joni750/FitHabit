<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habit;
use App\Models\Habit_List;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class Habit_ListController extends Controller
{

/*TODO: PARA REINICIAR EL "QUANTITY_START" DE LA LISTA DE HABITOS PERSONALES PUEDES PILLAR CON EL
CARBON LA HORA, Y SI LA HORA SON LAS 12:00 (O LAS 00:00) SE HACE UNA UPDATE A LA BD*/

/**
     * Display a listing of the resource.
     */
    public function index()
    {
        //buscamos el id del usuario d ela session y en base a eso sacamos la lista que tenga el id del
        // usuario que tiene la session iniciada
        $id_user = auth()->user()->id;
        $habit_list = Habit_List::all()->where("user_id", $id_user);
        // dd("Lista de los habitos->", $habit_list);

        //todos los habitos para la lista de añadir los habitos
        $habits = Habit::all();

        return view("habits.index", ["habits"=>$habits,"habit_list"=>$habit_list]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //Actualizar el valor del habito
        // dd($request->all());
        $datos = $request->all();

        //sacar los datos del request y obtener el usuario de la session
        $id_habit = $id;
        $nuevoRango = $datos["nuevoValor"];
        $id_user = auth()->user()->id;
        // dd("habito ", $id_habit, "rango", $nuevoRango, "usuario",$id_user); //-> si se hace :)

        //Hacemos ahora la update
        DB::update('update habit_lists set quantity_end = ? where user_id = ? AND id_habit = ?', [$nuevoRango, $id_user, $id_habit]);

        return response()->json(["success" => "Se ha actualizado tu habito"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Eliminar el habito de tu lista
        // dd($request->all());

        $id_habit = $id;
        $id_user = auth()->user()->id;

        DB::delete('DELETE FROM habit_lists WHERE id = ? AND user_id = ?', [$id_habit,$id_user]);

        return response()->json(["success" => "Removido con exito"]);

    }

    public function actualizarContador ($id, Request $request) {
        $datos = $request->all();
        // dd($datos);
        $id_habito = $id;
        $user = auth()->user()->id;
        $nuevoValor = $datos['valor'];

        DB::update('update habit_lists set quantity_start = ? where user_id = ? AND id = ?', [$nuevoValor, $user, $id_habito]);

        return response()->json(["success" => "Actualizado con exito"]);

    }

}
