<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Suscription_Type;
use App\Models\Suscription;
use App\Http\Controllers\SuscriptionController;
use Illuminate\Support\Str;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/inicio';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dni' => ['required', 'regex:/^[0-9]{8}[a-zA-Z]$/', 'unique:users'],
            'birth_day' => ['required', 'date', 'before:' . now()->subYears(14)->format('Y-m-d')],
            'sex' => ['required', 'in:Hombre,Mujer,Ns/Nc'],
        ]);


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data) {
        $rol = Role::where('name', 'user')->first();

        // Crear usuario
        $user = User::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'dni' => $data['dni'],
            'password' => Hash::make($data['password']),
            'birth_day' => $data['birth_day'],
            'sex' => $data['sex'],
            'avatar' => 'default.png',
            'role_id' => $rol->id,
        ]);

        // Crear suscripción
        $userId = $user->id;

        $this->crearSuscripcion($data, $user->id);

        return $user;

    }

   protected function crearSuscripcion(array $data, $userId){
    app(SuscriptionController::class)->crearSuscripcion($data, $userId);
}
// protected function uploadImage($file){
    // $nombreImagen = Str::random(10) . "_" . $file->getClientOriginalName();
    // $file->move('images/ftperfil', $nombreImagen);
//
    // return $nombreImagen;
// }
}
