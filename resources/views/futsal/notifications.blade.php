@extends('layouts.app')


@section('content')
<div class="container">
    <h3 class="">My Notifications</h3>

    <div class=" mb-3">
        @forelse ($notifications as $notification)
            <div class="d-flex align-items-center mb-3 shadow p-2 rounded">
                A customer has booked from {{ $notification['data']['from'] }} - {{ $notification['data']['to'] }} on {{ $notification['data']['date'] }}
            </div>
        @empty
            
        @endforelse
    </div>

    @if(count($notifications) < 1)
        <div class="text-center">
          No notifications available yet.
        </div>
    @endif

    <div class="d-flex justify-content-center align-items-center"> 
        {{$notifications->links()}}
    </div>


</div>
@stop

@push('js')
<script>

</script>
@endpush