<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Habit;
use App\Models\HabitTranslation;
use App\Models\Habit_List;
use Illuminate\Support\Str;

class HabitosAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $habits = Habit::all();

        return view('admin.habits.index', compact('habits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locales = config('translatable.locales');

        return view('admin.habits.create', ['locales' => $locales]);
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
              "name_$locale" => 'required|string|max:50',
              "value_$locale" => 'required|string|max:50',
              'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        }

        // Crea un nuevo hábito
        $habit =  Habit::create($validatedData);

        //Almaceno las traducciones en todos los idiomas
        foreach ($locales as $locale) {
            $name = $request->input('name_' . $locale);
            $value = $request->input('value_' . $locale);
            $habit->translateOrNew($locale)->name = $name;
            $habit->translateOrNew($locale)->value = $value;
            $habit->save();
        }

        // Obtén el nombre único para la imagen
        $nombreImagen = Str::random(10) . "_" . $request->file('image')->getClientOriginalName();

        // Mueve la foto al servidor
        $request->file('image')->move('images/habitos', $nombreImagen);

        // Actualiza el campo 'imagen' en la base de datos
        $habit->update(['image' => $nombreImagen]);

        // Redirige a la lista de hábitos
        return redirect()->route('habitos.index');
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
        $habit = Habit::find($id);

        $locales = config('translatable.locales');

        return view('admin.habits.edit', ['locales' => $locales], compact('habit'));
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

        // Valida los datos del formulario
        foreach ($locales as $locale) {
            $validatedData = $request->validate([
              "name_$locale" => 'required|string|max:50',
              "value_$locale" => 'required|string|max:50',
              'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        }

        $habit = Habit::find($id);

        foreach ($locales as $locale) {
            $name = $request->input('name_' . $locale);
            $value = $request->input('value_' . $locale);
            $habit->translateOrNew($locale)->name = $name;
            $habit->translateOrNew($locale)->value = $value;
            $habit->save();
        }

        $habit->update($request->all());

        // Obtén el nombre único para la imagen
        $nombreImagen = Str::random(10) . "_" . $request->file('image')->getClientOriginalName();

        // Mueve la foto al servidor
        $request->file('image')->move('images/habitos', $nombreImagen);

        // Actualiza el campo 'imagen' en la base de datos
        $habit->update(['image' => $nombreImagen]);

        // Redirige a la lista de hábitos
        return redirect()->route('habitos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HabitTranslation::where('habit_id', $id)->delete();

        Habit_List::where('id_habit', $id)->delete();

        $habit = Habit::findOrFail($id);

        $habit->delete();

        return back();
    }
}
