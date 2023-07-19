@extends('layouts.app')


@section('content')
<div class="container">
    <div class="table-responsive mb-3">
    <table class="table table-light mt-3 box-shadow">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Status</th>
                <th>Date</th>
                <th>From Time</th>
                <th>To Time</th>
                <th>Price</th>
                <th>Customer</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $key => $booking)
            <tr class="">
                <td nowrap>{{$key + 1}}</td>
                <td nowrap>{{$booking->status}}</td>
                <td nowrap>{{\Carbon\Carbon::parse($booking->date)->format('d, M, Y')}}</td>
                <td nowrap>{{$booking->from}}</td>
                <td nowrap>{{$booking->to}}</td>
                <td nowrap>Rs. {{$booking->price}}</td>
                <td nowrap><div class="">
                   <div class="mb-2 d-flex align-items-center"> Name : {{ $booking->customer->name}}</div>
                   <div class="mb-2 d-flex align-items-center"> Email : {{ $booking->customer->email}}</div>
                    </div>
                </td>
                <td nowrap>{{$booking->created_at->diffForHumans()}}</td>
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

@push('js')
<script>

</script>
@endpush