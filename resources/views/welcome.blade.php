@extends('layouts.app')

@section('content')
    <div class="">
        <div class="hero d-flex align-items-center">

            <div class="container d-flex flex-column justify-content-between flex-md-row align-md-items-center">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <h1 class="hero_title">
                        ENJOY YOUR GAME <br /> AT YOUR BEST
                    </h1>
                </div>


                <img src="{{ asset('images/player.png') }}" class="hero_image" />
            </div>

        </div>

        <div class="container my-4">
            <form action="{{ url('/search-results') }}" class="form-inline my-2 my-lg-0">
                @csrf
                <div class="row">
                    <input name="q" class="form-control col mr-sm-2" type="search"
                        placeholder="Type futsal name here" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0 col-auto" type="submit">Search</button>
                </div>
            </form>
        </div>
        <div class="container">
            <div class="row gx-3">
                <div class="col-12 col-md-4 d-flex flex-column p-3 align-items-center shadow">
                    <img class="image__" src="{{ asset('images/map.png') }}" />
                    <p class="text-center">
                        Are you looking for a place to enjoy your game without actually having to visit the place before the
                        game?
                    </p>
                </div>
                <div class="col-12 col-md-4 d-flex flex-column p-3 align-items-center shadow">
                    <img class="image__" src="{{ asset('images/bookiing.png') }}" />
                    <p class="text-center">
                        After finding the perfect venue connect with them through the book now button and make easier
                        payment.
                    </p>
                </div>
                <div class="col-12 col-md-4 d-flex flex-column p-3 align-items-center shadow">
                    <img class="image__" src="{{ asset('images/ball.png') }}" />
                    <p class="text-center">
                        You'r the planner who has found the perfect venue for all your friends to enjoy and play.
                    </p>
                </div>
            </div>

            <div class="row mt-5">
                <h6 class="text-center">FIND VENUE</h6>
            </div>
        </div>

        {{-- Venues --}}
        <div class="container mt-4">

            <div class="row">
                <h5 class="text-center">Book your spot to be on the spotlight</h5>
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
                        No venue available for now.
                    </div>
                @endforelse
            </div>

        </div>
    </div>
@endsection
