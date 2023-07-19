@extends('layouts.app')

@section('content')
<div class="">
    {{-- Venues --}}
    <div class="container mt-4">

        <div class="row">
            <h5 class="text-center"> Search results for <b>{{$q}}</b></h5>
        </div>

        <div class="mt-4 row">

            @forelse($futsals as $key => $futsal)

            <div class="mb-3 col-12 col-md-4 gx-3 futsal shadow d-flex flex-column align-items-center p-3">
                <img class="image__" src="{{ $futsal->image ?? asset('images/ball.png') }}" />

                <a href="{{ route('single.show', $futsal->id) }}">
                    <h5 class="futsal_title">{{ $futsal->name }}</h5>
                </a>

                <div class="d-flex justify-content-between align-items-center">


                </div>

            </div>

            @empty
            <div class="mb-3 col-12 col-md-4 gx-3">
                No search results
            </div>
            @endforelse
        </div>

    </div>
</div>
@endsection