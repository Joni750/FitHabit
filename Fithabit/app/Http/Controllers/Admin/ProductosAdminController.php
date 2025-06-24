<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductTranslation;
use Illuminate\Support\Str;


class ProductosAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales = config('translatable.locales');

        return view('admin.products.create', ['locales' => $locales]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $locales = config('translatable.locales');

        // Valida los datos del formulario
        foreach ($locales as $locale) {
            $validatedData = $request->validate([
              "name_$locale" => 'required|string|max:255',
              "description_$locale" => 'required|string|max:255',
              'price' => 'required|numeric',
              'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        }

        // Crea un nuevo producto
        $product = Product::create($validatedData);

        //Almaceno las traducciones en todos los idiomas
        foreach ($locales as $locale) {
            $name = $request->input('name_' . $locale);
            $description = $request->input('description_' . $locale);
            $product->translateOrNew($locale)->name = $name;
            $product->translateOrNew($locale)->description = $description;
            $product->save();
        }

        // Obtén el nombre único para la imagen
        $nombreImagen = Str::random(10) . "_" . $request->file('image')->getClientOriginalName();

        // Mueve la foto al servidor
        $request->file('image')->move('images/productos', $nombreImagen);

        // Actualiza el campo 'imagen' en la base de datos
        $product->update(['image' => $nombreImagen]);

        // Redirige a la lista de productos
        return redirect()->route('productos.index');

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
        $product = Product::find($id);

        $locales = config('translatable.locales');

        return view('admin.products.edit', ['locales' => $locales], compact('product'));
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
        $locales = config('translatable.locales');

        foreach ($locales as $locale) {
            $request->validate([
                "name_$locale" => 'required|string|max:255',
                "description_$locale" => 'required|string|max:255',
                'price' => 'required|numeric',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        }

        $product = Product::find($id);

        foreach ($locales as $locale) {
            $name = $request->input('name_' . $locale);
            $description = $request->input('description_' . $locale);
            $product->translateOrNew($locale)->name = $name;
            $product->translateOrNew($locale)->description = $description;
            $product->save();
        }



        $product->update($request->all());

        // Obtén el nombre único para la imagen
        $nombreImagen = Str::random(10) . "_" . $request->file('image')->getClientOriginalName();

        // Mueve la foto al servidor
        $request->file('image')->move('images/productos', $nombreImagen);

        // Actualiza el campo 'imagen' en la base de datos
        $product->update(['image' => $nombreImagen]);

        // Redirige a la lista de productos
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductTranslation::where('product_id', $id)->delete();

        $product = Product::findOrFail($id);

        $product->delete();

        return back();
    }

}

