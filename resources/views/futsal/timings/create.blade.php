@extends('layouts.app')

@section('heaad')
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
<div class="container mt-4">
  <div class="card">
  <div class="card-header">
    <h3 class="card-title">Add New Time</h3>
  </div>
  <div class="">
  </div>

  <!-- form start -->
  <form role="form" method="POST" action="{{ route('futsal.timings.store') }}">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="name">Name</label>
        <select class="form-control timings" id="timings" name="timings[]" multiple="multiple">
          @forelse($timings as $timing)
            <option value="{{ $timing->id }}">{{ $timing->from . " - ". $timing->to }} (Rs. {{ $timing->price }})</option>
          @empty

          @endforelse
        </select>

      </div>

    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
</div>
@endsection

@push('js')
<script> 
      $(document).ready(function() {
        $('#timings').select2({});
          theme: "classic"
        });
</script>
@endpush