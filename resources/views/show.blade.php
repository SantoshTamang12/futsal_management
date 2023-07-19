@extends('layouts.app')
@section('head')
        <style>
      .select2-container--default .select2-selection--multiple .select2-selection__choice {
      background-color: #e4e4e4;
      border: 1px solid #aaa;
      border-radius: 4px;
      cursor: default;
      float: left;
      margin-right: 5px;
      margin-top: 5px;
      padding: 0 5px;
      color: #000;
    }
</style>
@endsection
@section('content')
    <div class=" mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 d-flex flex-column">
                    <h5 class="text-md">{{ $futsal->name }}
                    <img class="w-100 my-1  show-image" src="{{ $futsal->image ?? asset('images/ball.png') }}" />

                    <label class="mt-3">Location</label>
                    <p class="mt-1">{{ $futsal->location }}</p>
                </div>
                <div class="col-12 col-md-6">

                    <div class="row other-info w-100 mt-4">

                        <label class="label mb-3">Other Information</label>

                        <div class="mb-3">
                            <label class="address-label w-100 row">Address</label>
                            <div class="mb-1 text">
                                {{ $futsal->location }}
                            </div>
                        </div>

                        <div class="">
                            <label class="address-label w-100 row">Phone</label>
                            <div class="mb-1 text">
                                {{ $futsal->phone }}
                            </div>
                        </div>

                    </div>

                </div>
            </div>

            <div class="mt-4 book-section ">

                <div class="row">
                    <div class="col-md-8">
                        <label class="mb-3 label">Book Online at {{ $futsal->name }}</label>
                        <div class="d-flex ">
                            <div class="available">Available </div>
                            <div class="mx-5 booked">Booked</div>
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                        <a class="btn btn-success" href="{{route('chat.make',$futsal)}}">Message</a>
                    </div>
                </div>

                <div class="calender my-3 row">
                    @forelse ($slots as $key => $value)
                        <div class="mb-3 d-flex align-items-center">
                            <div class="calender_title">
                                {{ $value['day'] }}
                            </div>
                            <div class="calender_body d-flex  ">
                                @forelse ($value['times'] as $time)

                                    <form
                                        method="POST"
                                        action="{{ route('customer.book.futsal') }}"
                                        class="calender_body_time mb-3 col-2 d-flex flex-column align-items-center mx-3 {{ $time['booked'] ? 'slot_booked' : 'slot_available' }}">
                                        @csrf
                                        <input type="hidden" name="futsal_id" value="{{ $futsal->id }}" />
                                        <input type="hidden" name="date" value="{{ $time['date'] }}" />
                                        <input type="hidden" name="from" value="{{ $time['start'] }}" />
                                        <input type="hidden" name="to" value="{{ $time['end'] }}" />
                                        <span >{{ $time['start'] }}</span>
                                        <span class="calender_availabilty ">
                                            {{ $time['booked'] ? 'Booked' : 'Available' }}
                                        </span>
                                        <span class="hour">1 Hour</span>
                                        @if(!$time['booked'])
                                        <button type="submit" class="btn btn-submit">
                                            <span>Book</span> <br />
                                            <span>(Rs .{{ $time['price'] }})</span>
                                        </button>
                                        @endif
                                    </form>

                                @empty

                                @endforelse
                            </div>
                        </div>
                    @empty

                    @endforelse
                </div>

            </div>
        </div>
    </div>
@endsection

@push('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>

    $( ".date" ).datepicker({
      altField: "#actualDate",
        minDate: new Date()
    });

        $('#timings').select2({});

</script>

@endpush
