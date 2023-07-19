@extends('adminlte::page')

@section('title', 'Add Time')

@section('content_header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@stop

@section('content')


    <div class="container mt-3 p-2">

        <h3 class="m-0 mb-2">Add New Time</h3>

        <div class="bg-white shadow p-3">
            <form method="POST" action="{{ route('admin.timings.store') }}">
            
                @csrf
                <div class="row mb-4">
                    <div class="col-12 form-group  ">
                        <label for="price" class="">Price </label>
                        <input type="number" name="price" class="form-control" value="{{ old('price') ?? '' }}" />
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-12 col-md-6 form-group mb-4">
                        <label for="from" class="">From Time </label>
                        <input type="text" name="from" class="form-control from"  value="{{ old('from') ?? '' }}"/>
                    </div>

                    <div class="col-12 col-md-6 form-group mb-4">
                        <label for="to" class="">To Time </label>
                        <input type="text" name="to" class="form-control to" 
                        value="{{ old('to') ?? '' }}"/>
                    </div>
                </div>

                <div class="d-flex justify-content-end align-items-center">

                    <button type="submit" class="btn btn-primary">
                        Add
                    </button>

                </div>


            </form>

        </div>


    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/toastr.min.js') }}"></script>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>
    // toastr.success("{{ session()->get('success') }}");


    $('.from').timepicker({
    timeFormat: 'h:mm p',        interval: 60,
        defaultTime: "{{ old('from') }}" || "06",
        startTime: '06:00',
    });

    $('.to').timepicker({
    timeFormat: 'h:mm p',        interval: 60,
        defaultTime: "{{ old('to') }}" || "06",
        startTime: '06:00',
    });

</script>
@stop