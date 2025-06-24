<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Suscription;
use App\Models\Habit_List;
use App\Models\Order;
use App\Models\Order_Detail;
use App\Models\Reservation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UsersAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view("admin.users.index", ["users"=>$users]);
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
        $user = User::find($id);

        return view('admin.users.edit',  compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            "name" => 'required|string|max:50',
            "lastname" => 'required|string|max:255',
            "email" => 'required|string|email|max:255',
            'dni' => 'required|regex:/^[0-9]{8}[a-zA-Z]$/',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sex' => 'required|in:Hombre,Mujer,Ns/Nc',
        ]);

        $user = User::find($id);

        $user->update($request->all());

        // Obtén el nombre único para la imagen
        $nombreImagen = Str::random(10) . "_" . $request->file('avatar')->getClientOriginalName();

        // Mueve la foto al servidor
        $request->file('avatar')->move('images/ftperfil', $nombreImagen);

        // Actualiza los campos en la base de datos
        $user->update([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'dni' => $request->input('dni'),
            'avatar' => $nombreImagen,
            'sex' => $request->input('sex'),
        ]);

        // Redirige a la lista de productos
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {

        Suscription::where('user_id', $id)->delete();

        Habit_List::where('user_id', $id)->delete();

        Reservation::where('user_id', $id)->delete();

        Order_Detail::whereIn('id_order', function($query) use ($id) {
            $query->select('id')
                  ->from('orders')
                  ->where('id_user', $id);
        })->delete();

        Order::where('id_user', $id)->delete();

        User::find($id)->delete();

        // Order_Detail::where('id_order', $id)->delete();

        // Order::where('id_user', $id)->delete();

        return back();

    }
}
