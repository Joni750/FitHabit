@extends('adminlte::page')

@section('content_header')
    <h1>FitHabit</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$cantidadUsers}}</h3>

              <p>Usuarios registrados</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="{{route("usuarios.index")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$cantidadOrders}}</h3>

              <p>Pedidos realizados</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="{{route("pedidos.index")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$cantidadReservations}}</h3>

              <p>Reservas realizadas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route("reservas.index")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$cantidadProducts}}</h3>

              <p>Todos los productos</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route("productos.index")}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>

    {{-- Gráficos --}}

    <div class="graficos">
        <div style="width: 33%">
            <canvas id="myChart"></canvas>
        </div>

        <div style="width: 33%">
            <canvas id="mySubscriptionChart"></canvas>
        </div>

        <div style="width: 33%">
            <canvas id="myOrderReservationChart"></canvas>
        </div>

@stop

@section('css')
    <link rel="stylesheet" href="{{asset('css/admin/admin.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/tabla.css')}}">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        // sexo de los usuarios

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                    label: 'Porcentaje de Usuarios por Género',
                    data: {!! json_encode($data) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Porcentaje de Usuarios por Género'
                    },
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.formattedValue + ' (' + ((context.parsed / {!! $totalUsers !!}) * 100).toFixed(2) + '%)';
                            }
                        }
                    }
                }
            }
        });

        // tipos de sucripcion

        var ctx2 = document.getElementById('mySubscriptionChart').getContext('2d');
        var mySubscriptionChart = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: {!! json_encode($labels2) !!},
                datasets: [{
                    label: 'Porcentaje de Suscripciones Activas por Tipo',
                    data: {!! json_encode($data2) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Porcentaje de Suscripciones Activas por Tipo'
                    },
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.formattedValue + ' (' + ((context.parsed / {!! $totalSubscriptions !!}) * 100).toFixed(2) + '%)';
                            }
                        }
                    }
                }
            }
        });

        // reservas y pedidos

        var ctx3 = document.getElementById('myOrderReservationChart').getContext('2d');
        var myOrderReservationChart = new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: {!! json_encode($labels3) !!},
                datasets: [{
                    label: 'Porcentaje de Pedidos y Reservas',
                    data: {!! json_encode($data3) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    title: {
                        display: true,
                        text: 'Porcentaje de Pedidos y Reservas'
                    },
                    legend: {
                        position: 'bottom'
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.formattedValue;
                            }
                        }
                    }
                }
            }
        });

    </script>
@stop
