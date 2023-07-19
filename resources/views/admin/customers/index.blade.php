@extends('adminlte::page')

@section('title', 'Customer List')

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
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td nowrap >{{$customer->id}}</td>
                <td nowrap >{{$customer->name}}</td>
                <td nowrap >{{$customer->email}}</td>
                <td nowrap >{{$customer->phone}}</td>
                <td nowrap >{{$customer->created_at->diffForHumans()}}</td>
                <td nowrap  class="d-flex align-items-center" >
                    <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" id="delete-form-{{ $customer->id }}">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">Delete</button>
                    </form>
                  </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

    @if(count($customers) < 1)
        <div class="text-center">
          No customers available yet.
        </div>
    @endif

    <div class="d-flex justify-content-center align-items-center"> 
        {{$customers->links()}}
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