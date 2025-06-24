<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Suscription_Type;
use App\Models\Suscription;

class TiposSuscripcionesAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiposSuscriptions = Suscription_Type::all();

        return view("admin.tiposSuscriptions.index", ["tiposSuscriptions"=>$tiposSuscriptions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tiposSuscriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $suscriptionData = $request->except('_token');

        $validator = Validator::make($suscriptionData, [
            "name" => 'required|string|max:50',
            'months' => 'required|numeric',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'benefits' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        // Lógica para guardar la reserva si la validación pasa
        Suscription_Type::create($suscriptionData);

        return redirect()->route('tiposSuscripciones.index');
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
        $tiposSuscriptions = Suscription_Type::find($id);

        return view('admin.tiposSuscriptions.edit', compact('tiposSuscriptions'));
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
        $request->validate([
            "name" => 'required|string|max:50',
            'months' => 'required|numeric',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'benefits' => 'required|string|max:255',
        ]);

        $tiposSuscriptions = Suscription_Type::find($id);

        $tiposSuscriptions->update($request->all());

        // Redirige a la lista de productos
        return redirect()->route('tiposSuscripciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Suscription::where('id_suscription_type', $id)->delete();

        $tiposSuscriptions = Suscription_Type::find($id);

        $tiposSuscriptions->delete();

        return back();
    }
}
