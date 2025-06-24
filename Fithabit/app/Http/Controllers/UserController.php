<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Reservation;
use App\Models\Order;
use App\Models\Order_Detail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users= User::all();
        $users = auth()->user();

        return view('users.show',['users'=>$users]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
     //   dd($user);
        // return view("users.show",['user'=> $user]);
        $reservations = Reservation::where('user_id', $id)->get();
        $orders = Order::where('id_user', $id)->get();
               return view("users.show", ['user' => $user, 'reservations' => $reservations, 'orders' => $orders]);
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
        //
    }

/*
public function uploadImage(Request $request)
{
    $request->validate([
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Obtén el nombre único para la imagen
    $nombreImagen = Str::random(10) . "_" . $request->file('img')->getClientOriginalName();

    // Mueve la foto al servidor
    $request->file('img')->move('images/ftperfil', $nombreImagen);

    // Actualiza el campo 'imagen' en la base de datos
    auth()->user()->update(['avatar' => $nombreImagen]);

    return redirect()->back()->with('success', 'Imagen subida exitosamente.');
}*/
public function uploadImage(Request $request)
{
    ini_set('upload_max_filesize', '30M');
    ini_set('post_max_size', '30M');
    $request->validate([
        'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:20480',
    ]);

    // Obtén el nombre único para la imagen
    $nombreImagen = Str::random(10) . "_" . $request->file('img')->getClientOriginalName();

    // Mueve la foto al servidor
    $request->file('img')->move('images/ftperfil', $nombreImagen);

    // Actualiza el campo 'imagen' en la base de datos
    auth()->user()->update(['avatar' => $nombreImagen]);

    return response()->json(['success' => true]);
}
}
