<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Habit;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Role::factory()->create([
            'name' => 'user',
        ]);

        \App\Models\Role::factory()->create([
            'name' => 'admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'user@user.com',
            'DNI' => '98657834L',
            'password' => Hash::make('12345678'),
            'role_id' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'DNI' => '43567598H',
            'password' => Hash::make('12345678'),
            'role_id' => 2,
        ]);
         \App\Models\Suscription_Type::factory()->create([
            'name' => 'gratuita',
            'months' => 0,
            'price' => 0,
            'benefits' => '',
        ]);
        \App\Models\Suscription_Type::factory()->create([
            'name' => 'mensual',
            'months' => 1,
            'price' => 29.99,
            'benefits' => '5% de descuento',
        ]);
        \App\Models\Suscription_Type::factory()->create([
            'name' => 'trimestral',
            'months' => 3,
            'price' => 84.99,
            'benefits' => '10% de descuento',
        ]);
        \App\Models\Suscription_Type::factory()->create([
            'name' => 'anual',
            'months' => 12,
            'price' => 319.99,
            'benefits' => '15% de descuento',
        ]);

        $dataProducto = [
            [
            'price' => 4,
            'image' => 'ensalada.jpg',
            'es' => ['name' => 'Ensalada completa', 'description' => 'Ensalada fresca y completa, lleva lechuga, tomate, aguacate, atún y pollo.'],
            'en' => ['name' => 'Complete salad', 'description' => 'Fresh and complete salad, with lettuce, tomato, avocado, tuna and chicken.'],
            'eu' => ['name' => 'Entsalada osoa', 'description' => 'Entsalada freskoa eta osoa, letxuga, tomatea, ahuakatea, atuna eta oilaskoa daramatza.'],
            ],

            [
            'price' => 6,
            'image' => 'arroz.jpg',
            'es' => ['name' => 'Arroz con pollo', 'description' => 'Arroz con pollo, lleva arroz, pimiento rojo y verde, cebolla y pollo.'],
            'en' => ['name' => 'Chicken rice', 'description' => 'Rice with chicken, has rice, red and green pepper, onion and chicken.'],
            'eu' => ['name' => 'Arroza oilaskoarekin', 'description' => 'Arroza oilaskoarekin, arroza , piper gorria eta berdea, tipula eta oilaskoa darama.'],
            ],
            [
            'price' => 5,
            'image' => 'albondigas.jpg',
            'es' => ['name' => 'Albondigas en salsa', 'description' => 'Albondigas en salsa, lleva albondigas de ternera con salsa'],
            'en' => ['name' => 'Meatballs in sauce ', 'description' => 'Meatballs in sauce, has beef meatballs with sauce'],
            'eu' => ['name' => 'Haragi-bolak saltsan', 'description' => 'Albondigak saltsan, txahal-albondigak saltsarekin'],
            ],
            [
            'price' => 6,
            'image' => 'tallarines.jpg',
            'es' => ['name' => 'Tallarines con carne', 'description' => 'Tallarines con carne, lleva tallarines, carne de vacunoy salsa de tomate.'],
            'en' => ['name' => 'Noodles with meat', 'description' => 'Noodles with meat, has noodles, beef and tomato sauce.'],
            'eu' => ['name' => 'Tailuak okelarekin', 'description' => 'Tailuak haragiarekin, tailuak, txertaketa-haragia eta tomate-saltsa.'],
            ],
            [
            'price' => 6,
            'image' => 'macarrones.jpeg',
            'es' => ['name' => 'Macarrones con tomate', 'description' => 'Macarrones con tomate, lleva macarrones, queso rayado y salsa de tomate natural.'],
            'en' => ['name' => 'Macaroni with tomato', 'description' => 'Macaroni with tomato, has macaroni, grated cheese and natural tomato sauce.'],
            'eu' => ['name' => 'Makarroiak tomatearekin', 'description' => 'Makarroiak tomatearekin, makarroiak, gazta marratua eta tomate naturalaren saltsa.'],
            ],
            [
            'price' => 5,
            'image' => 'pechuga.jpg',
            'es' => ['name' => 'Pechugas a la plancha', 'description' => 'Pechugas a la plancha, lleva pechuga de pollo y surtido de verduras'],
            'en' => ['name' => 'Grilled breasts', 'description' => 'Grilled breasts, with chicken breast and assorted vegetables'],
            'eu' => ['name' => 'Bularkiak plantxan', 'description' => 'Bularkiak plantxan, oilasko-paparra eta barazki-sorta daramatza'],
            ],
        ];

        foreach($dataProducto as $product){
            Product::create($product);
        }

        $dataHabito = [
            [
            'image' => '/images/habitos/gota.png',

            'es' => ['name' => 'BEBER AGUA', 'value' => 'vasos'],
            'en' => ['name' => 'DRINK WATER', 'value' => 'glasses'],
            'eu' => ['name' => 'URA EDAN', 'value' => 'edalontziak'],
            ],
            [
            'image' => 'images/habitos/diente.png',

            'es' => ['name' => 'LAVARSE LOS DIENTES','value' => 'veces'],
            'en' => ['name' => 'BRUSH YOUR TEETH','value' => 'times'],
            'eu' => ['name' => 'HORTZAK GARBITZEA','value' => 'aldiz'],
            ],
            [
            'image' => 'images/habitos/pesa.png',

                'es' => ['name' => 'HACER EJERCICIO', 'value' => 'minutos'],
                'en' => ['name' => 'DO EXERCISE', 'value' => 'minutes'],
                'eu' => ['name' => 'KIROL EGITEA','value' => 'minutu'],
            ],
            [
            'image' => 'images/habitos/libro.png',

                'es' => ['name' => 'LEER', 'value' => 'páginas'],
                'en' => ['name' => 'READ', 'value' => 'pages'],
                'eu' => ['name' => 'IRAKURRI','value' => 'orrialdeak'],
            ],
            [
            'image' => 'images/habitos/cama.png',

                'es' => ['name' => 'DORMIR', 'value' => 'horas'],
                'en' => ['name' => 'SLEEP', 'value' => 'hours'],
                'eu' => ['name' => 'LO EGIN', 'value' => 'orduak'],
            ],
            [
                'image' => 'images/habitos/ducha.svg',

                    'es' => ['name' => 'DUCHARSE', 'value' => 'veces'],
                    'en' => ['name' => 'TAKE A SHOWER','value' => 'times'],
                    'eu' => ['name' => 'DUTXA HARTZEA','value' => 'aldiz'],
                ],
                [
                'image' => 'images/habitos/comer.svg',

                    'es' => ['name' => 'COMER','value' => 'veces'],
                    'en' => ['name' => 'EAT','value' => 'times'],
                    'eu' => ['name' => 'JATEA','value' => 'aldiz'],
                ],
                [
                'image' => 'images/habitos/estudiar.svg',

                    'es' => ['name' => 'ESTUDIAR','value' => 'minutos'],
                    'en' => ['name' => 'STUDY','value' => 'minutes'],
                    'eu' => ['name' => 'IKASI','value' => 'minutu'],
                ],
                [
                'image' => 'images/habitos/trabajar.svg',

                    'es' => ['name' => 'TRABAJAR','value' => 'horas'],
                    'en' => ['name' => 'WORK','value' => 'hours'],
                    'eu' => ['name' => 'LAN EGIN','value' => 'orduak'],
                ],
                [
                'image' => 'images/habitos/descansar.svg',

                    'es' => ['name' => 'DESCANSAR', 'value' => 'minutos'],
                    'en' => ['name' => 'REST', 'value' => 'minutes'],
                    'eu' => ['name' => 'ATSEDEN HARTZEA','value' => 'minutu'],
                ],
                [
                'image' => 'images/habitos/limipar.svg',

                    'es' => ['name' => 'LIMPIAR','value' => 'veces'],
                    'en' => ['name' => 'CLEAN','value' => 'times'],
                    'eu' => ['name' => 'GARBITU','value' => 'aldiz'],
                ],
                [
                    'image' => 'images/habitos/limpiarManos.svg',

                        'es' => ['name' => 'LAVARSE LAS MANOS','value' => 'veces'],
                        'en' => ['name' => 'WASH YOUR HANDS','value' => 'times'],
                        'eu' => ['name' => 'ESKUAK GARBITU','value' => 'aldiz'],
                    ],
        ];

        foreach($dataHabito as $habit){
        Habit::create($habit);
        }

    }
}

