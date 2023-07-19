@extends('adminlte::page')

@section('title', 'Futsal List')

@section('content_header')
    {{-- <a class="btn btn-primary" href="{{route('patients.create')}}">Create</a> --}}
@stop

@section('content')
<div class="table-responsive mb-3">
    <table class="table table-light mt-3">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th >Created A</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($futsals as $futsal)
            <tr class="align-items-center">
                <td nowrap>{{$futsal->id}}</td>
                <td nowrap>{{$futsal->name}}</td>
                <td nowrap>{{$futsal->email}}</td>
                <td nowrap>{{$futsal->phone}}</td>
                <td nowrap>{{$futsal->created_at->diffForHumans()}}</td>

                <td nowrap class="d-flex align-items-center">
                    <form action="{{ route('admin.futsals.destroy', $futsal->id) }}" method="POST" id="delete-form-{{ $futsal->id }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="border-none btn btn-danger ml-3" onclick="return confirm('Are you sure you want to delete this futsal?')">Delete</button>
                    </form>
                  </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    @if(count($futsals) < 1)
        <div class="text-center">
          No futsals available yet.
        </div>
    @endif

    <div class="d-flex justify-content-center align-items-center"> 
        {{$futsals->links()}}
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/toastr.min.js') }}"></script>
@stop

@section('js')
<script>
        toastr.success("{{ session()->get('success') }}");
</script>
@stop