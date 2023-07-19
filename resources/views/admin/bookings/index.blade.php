@extends('adminlte::page')

@section('title', 'Booking List')

@section('content_header')
    {{-- <a class="btn btn-primary" href="{{route('patients.create')}}">Create</a> --}}
@stop

@section('content')
<div>
    <div class=" mt-3 mb-3 table-responsive">

        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>From Time</th>
                    <th>To Time</th>
                    <th>Price</th>
                    <th>Futsal</th>
                    <th>Customer</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $key => $booking)
                <tr>
                    <td  nowrap>{{$key + 1}}</td>
                    <td  nowrap>{{$booking->status}}</td>
                    <td  nowrap>{{\Carbon\Carbon::parse($booking->date)->format('d, M, Y')}}</td>
                    <td  nowrap>{{$booking->from}}</td>
                    <td  nowrap>{{$booking->to}}</td>
                    <td  nowrap>Rs. {{$booking->price}}</td>
                    <td nowrap>{{ $booking->futsal->name ?? '' }}</td>
                    <td nowrap>{{ $booking->customer->name ?? '' }}</td>
                    <td  nowrap>{{$booking->created_at->diffForHumans()}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

        @if(count($bookings) < 1)
            <div class="text-center">
              No bookings available yet.
            </div>
        @endif

        <div class="d-flex justify-content-center align-items-center"> 
            {{$bookings->links()}}
        </div>

    </div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/toastr.min.js') }}"></script>
@stop

@section('js')
<script>
        toastr.success("{{ session()->get('success') }}");
</script>
@stop