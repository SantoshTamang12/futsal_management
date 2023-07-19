@extends('adminlte::page')

@section('content')
    <div class="container mt-3">
        <div class="row gx-3">

            <div class="col-md-4 bg-white shadow  mb-4">
                <div class="card-header">Futsals</div>

                <div class="card-body">
                    {{  $futsals }}
                </div>
            </div>

            <div class="col-md-4 bg-white shadow  mb-4">
                <div class="card-header">Customers</div>

                <div class="card-body">
                    {{  $customers }}
                </div>
            </div>
            <div class="col-md-4 bg-white shadow  mb-4">
                <div class="card-header">Timings</div>

                <div class="card-body">
                    {{  $timings }}
                </div>
            </div>

            <div class="col-md-4 bg-white shadow  mb-4">
                <div class="card-header">Bookings</div>

                <div class="card-body">
                    {{  $bookings }}
                </div>
            </div>
        </div>
    </div>
@endsection
