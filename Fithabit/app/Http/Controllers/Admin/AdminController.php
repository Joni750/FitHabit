<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductTranslation;
use App\Models\Reservation;
use App\Models\Reservation_Detail;
use App\Models\User;
use App\Models\Suscription;
use App\Models\Suscription_Type;
use Carbon\Carbon;


class AdminController extends Controller
{
    public function index(){

        // Grafico de usuarios

        $users = User::select('sex')->get();

        $totalUsers = $users->count();

        $genderCounts = $users->groupBy('sex')->map->count();

        $labels = $genderCounts->keys();

        $data = $genderCounts->values();

        // Grafico tipos de suscripcion

        $subscriptions = Suscription::where('estatus', 'activa')->get();

        $totalSubscriptions = $subscriptions->count();

        $typeCounts = $subscriptions->groupBy('suscriptionType.name')->map->count();

        $labels2 = $typeCounts->keys();

        $data2 = $typeCounts->values();

        // Grafico reservas y pedidos

        $totalOrders = Order::count();

        $totalReservations = Reservation::count();

        $labels3 = ['Pedidos', 'Reservas'];

        $data3 = [$totalOrders, $totalReservations];

        // Cantidades

        $cantidadUsers = User::count();

        $cantidadOrders = Order::count();

        $cantidadReservations = Reservation::count();

        $cantidadProducts = Product::count();

        return view('admin.index', compact('cantidadUsers', 'cantidadOrders', 'cantidadReservations', 'cantidadProducts', 'labels', 'data', 'totalUsers', 'labels2', 'data2', 'totalSubscriptions', 'labels3', 'data3'));

    }
}
