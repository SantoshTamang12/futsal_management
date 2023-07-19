@extends('layouts.app')

@section('content')
    <div class="">

        {{-- Venues --}}
        <div class="container mt-4">

            <div class="row">
                <h5 class="text-left"> Venues</h5>
            </div>

            <div class="mt-4 d-flex flex-column">
                @forelse($futsals as $key => $futsal)
                    <div class="mb-1 futsal shadow d-flex  align-items-center p-3">
                        <img class="image__" src="{{ $futsal->image ?? asset('images/ball.png') }}" />

                        <div class="mx-3">
                            <a href="{{ route('single.show', $futsal->id) }}">
                                <h5 class="futsal_title">{{ $futsal->name }}</h5>
                            </a>
                            <span class="">{{ $futsal->location }}</span>
                        </div>


                    </div>

                @empty
                    <div class="mb-3 col-12 col-md-4 gx-3">
                        No venue available for now.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection
