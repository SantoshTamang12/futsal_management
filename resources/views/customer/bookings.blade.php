@extends("layouts.app")

@section('content')
    <div class="container mt-3">
        <div class=" ">
            <h4 class="">My Bookings</h4>
        </div>
        <div class=" table-responsive mt-3">

            <table class="table table-light ">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>From Time</th>
                        <th>To Time</th>
                        <th>Price</th>
                        <th>Futsal</th>
                        <th>Futsal Phone</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $key => $booking)
                    <tr class="box-shadow">
                        <td nowrap>{{$key + 1}}</td>
                        <td nowrap>{{$booking->status}}</td>
                        <td nowrap>{{\Carbon\Carbon::parse($booking->date)->format('d, M, Y')}}</td>
                        <td nowrap>{{$booking->from}}</td>
                        <td nowrap>{{$booking->to}}</td>
                        <td nowrap>Rs. {{$booking->price}}</td>
                        <td nowrap>{{ $booking->futsal->name }}</td>
                        <td nowrap>{{ $booking->futsal->phone }}</td>
                        <td nowrap>{{$booking->created_at->diffForHumans()}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if(count($bookings) < 1)
                <div class="text-center">
                  No bookings available yet.
                </div>
            @endif

            <div class="d-flex justify-content-center align-items-center"> 
                {{$bookings->links()}}
            </div>

        </div>

    </div>
@endsection
