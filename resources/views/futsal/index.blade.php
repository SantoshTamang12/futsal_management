@extends('layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row gx-3">


            <div class="col-md-4 bg-white box-shadow  mb-4">
                <div class="card-header">Timings</div>

                <div class="card-body">
                    {{  $timings }}
                </div>
            </div>

            <div class="col-md-4 bg-white box-shadow  mb-4">
                <div class="card-header">Bookings</div>

                <div class="card-body">
                    {{  $bookings }}
                </div>
            </div>
        </div>
    </div>
@endsection
