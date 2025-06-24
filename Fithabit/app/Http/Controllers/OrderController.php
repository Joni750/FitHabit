<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $precio = $request->all();
        $request->session()->put('finalPrice', $precio);
        $carrito = $request->session()->all();
        // dd($carrito);

        return view("order.index");
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
        // dd("Prueba de que llega el Ajax");
        try {
            // Your existing logic here
            // dd("Este son tus productos",$request->all());
            //Request de la hora
            $data = $request->all();

            // $p = $data["prueba"];

            //Carrito de la compra
            $sesion = $request->session()->all();
            $carrito = $sesion["cart"];
            // dd($carrito[0]->id);

            $id_user = auth()->user()->id;
            // dd($id_user);
            // dd("Cosas de la Session ->", $sesion);
            $hora = $data["horaOrden"];

            //Hora actual en españa (no canarias)
            $now = Carbon::now('Europe/Madrid');
            $fecha_actual = $now->format('Y-m-d H:i:s');
            //dd("fecha actual en europa ->",$fecha_actual);

            //Hacer una insert para la tabla "orders"
            DB::insert('insert into orders (id_user, delivery_date, payment_date, estatus) values (?, ?, ?, ?)', [$id_user, $hora, $fecha_actual ,1]);

            try {
                $id_orden_result = DB::select('select id from orders where id_user = ? AND payment_date = ? ', [$id_user, $fecha_actual]);

                // Check if the query returned any result
                if (!empty($id_orden_result)) {
                    // Extract the id from the result
                    $id_orden = $id_orden_result[0]->id;

                    // Rest of your code remains unchanged
                    $index = 0;
                    foreach (Order::all() as $orden_detail) {
                        $id_producto = $carrito[$index]->id;
                        DB::insert('insert into order_details (id_order, id_product) values (?,?)', [$id_orden, $id_producto]);
                        $index++;
                    }
                }
            } catch (\Exception $e) {
                dd("algo fallo en su logica de programacion carnal", $e);
            }
            //limpiar el carrito
            $request->session()->forget('cart');
            // return response()->json(['success' => 'Su orden ha sido realizada']);
        } catch (\Exception $e) {
            // Return an error response
            dd(response()->json(['error' => 'Error -> ',$e]));
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
