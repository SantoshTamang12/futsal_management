@extends('layouts.app')


@section('content')
<div class="container mt-4">
    <a class="btn btn-primary" href="{{route('futsal.timings.create')}}">Add New Time</a>
    <div class="table-responsive mb-3 ">

        <table class="table table-light mt-3 ">
            <thead class="thead-light">
                <tr>
                    <th>ID</th>
                    <th>Price</th>
                    <th>From Time</th>
                    <th>To Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($timings as $timing)
                <tr class="box-shadow">
                    <td nowrap>{{$timing->id}}</td>
                    <td nowrap>Rs {{$timing->timing->price}}</td>
                    <td nowrap>{{$timing->timing->from}}</td>
                    <td nowrap>{{$timing->timing->to}}</td>
                    <td class="d-flex align-items-center" >
                        <form action="{{ route('futsal.timings.destroy', $timing->id) }}" method="POST" id="delete-form-{{ $timing->id }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this timing?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    @if(count($timings) < 1)
        <div class="text-center">
          No timings available yet.
        </div>
    @endif

    <div class="d-flex justify-content-center align-items-center"> 
        {{$timings->links()}}
    </div>


</div>
@endsection

@push('js')
<script>
        toastr.success("{{ session()->get('success') }}");
</script>
@endpush