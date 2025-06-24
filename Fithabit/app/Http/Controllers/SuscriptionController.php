<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Suscription_Type;
use App\Models\Suscription;
use App\Models\User;
use Carbon\Carbon;

class SuscriptionController extends Controller
{
   // SuscriptionController.php
// public function seleccionarPlan(Request $request)
// {
//     // Guarda la elección del usuario en la sesión
//     session(['tipo_suscripcion' => $request->input('tipo_suscripcion')]);

//     // Redirige al formulario de registro
//     return redirect()->route('registro');
// }

    public function crearSuscripcion(array $data, $userId)
    {
        // Obtener el tipo de suscripción del formulario de registro
        $tipoSuscripcion = $data['tipo_suscripcion'];

        // Lógica de obtención del ID del tipo de suscripción según $tipoSuscripcion
        $suscriptionType = Suscription_Type::where('name', $tipoSuscripcion)->first();

        if (!$suscriptionType) {
            // Manejar el caso donde no se encuentra el tipo de suscripción
            return redirect()->back()->with('error', 'Tipo de suscripción no encontrado');
        }

        // Crear la suscripción en la tabla suscriptions
        $suscripcion = new Suscription([
            'user_id' => $userId,
            'id_suscription_type' => $suscriptionType->id,
            'suscription_date' => now(),
        ]);

        $suscripcion->save();

        // Puedes redirigir a una página de éxito o hacer lo que necesites.
        return redirect()->route('inicio')->with('success', 'Suscripción creada exitosamente');
    }

    // public function verificarSuscripciones()
    // {
    //     // Obtener todas las suscripciones activas
    //     $suscripciones = Suscription::where('estado', 'activa')->get();

    //     foreach ($suscripciones as $suscripcion) {

    //         $fechaExpiracion = Carbon::parse($suscripcion->fecha_inicio);

    //         // Ajustar la fecha de expiración según la duración de la suscripción
    //         switch ($suscripcion->tipo_duracion) {
    //             case 'mensual':
    //                 $fechaExpiracion->addMonth();
    //                 break;
    //             case 'trimestral':
    //                 $fechaExpiracion->addMonths(3);
    //                 break;
    //             case 'anual':
    //                 $fechaExpiracion->addYear();
    //                 break;
    //             default:
    //                 continue; // Si no se reconoce el tipo de duración, continuar con la próxima suscripción
    //         }

    //         // Verificar si la suscripción ha expirado
    //         if ($fechaExpiracion->isPast()) {
    //             $suscripcion->estado = 'caducada';
    //             $suscripcion->save();
    //         }

    //     }

    //     return response()->json(['message' => 'Suscripciones verificadas y actualizadas.']);
    // }


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
        // $tipoSuscripcion = $request->input('tipo_suscripcion');
//
      //  Obtener el tipo de suscripción asociado al valor del botón
        // $suscriptionType = Suscription_Type::where('name', $tipoSuscripcion)->first();
//
        // if (!$suscriptionType) {
           /// Manejar el caso donde no se encuentra el tipo de suscripción
            // return redirect()->back()->with('error', 'Tipo de suscripción no encontrado');
        // }
//
       // Obtener el ID del usuario autenticado
        // $userId = auth()->user()->id;
//
       // Crear una nueva suscripción
        // $suscripcion = new Suscription([
            // 'suscription_type_id' => $suscriptionType->id,
            // 'user_id' => $userId,
            // 'suscription_date' => now(),
        // ]);
//
        // $suscripcion->save();
//
        // return redirect()->route('index.index')->with('success', 'Suscripción creada exitosamente');
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
