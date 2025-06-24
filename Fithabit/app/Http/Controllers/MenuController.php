<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Session;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $menu = Product::all();
        // dd($menu);
        return view("products.index", ["menu"=>$menu]);
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
    public function show(string $id)
    {


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

    public function addProduct(Request $request, $id){
        $product = Product::FindOrFail($id);
        // dd($product);
        $carrito = Session::push('cart', $product);
        // dd(Session::all());
        $session = Session::all();
        // dd($session);
        return back();
        // return redirect()->back()->with('session', $session);
        // return view("products.index", ["carrito" => $carrito]);

    }


    public function deleteProduct(Request $request, $id){
        $posicion = $id;
        $producto = session()->get('cart', []);
        unset($producto[$posicion]);
        session()->put('cart', $producto);
        return back();
    }

}
