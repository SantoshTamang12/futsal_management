@extends('layouts.app')
@section('content')

<section class=" show-service row " id="">




</section>


@endsection

@push('js')

    <script>
        
        window.location = "{{ $checkout_url }}"

    </script>

@endpush