@extends('layouts.app')
@section('head')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css of fyp/gallery.css') }}" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('css of fyp/gallery.js') }}" defer></script>
@endsection
@section('content')
    <h1 style="text-align:center;">Gallery</h1><br>
    {{-- @dd($user->getMedia('gallery')[0]) --}}
    <div class="container">
        <div style="display:flex; gap:5px; flex-wrap:wrap; gap:25px; margin-bottom:15px;">
            @foreach ($user->getMedia('gallery') as $image)
                <div style="width:280px;height:225px;position: relative;" class="image-container">
                    <img src="{{ $image->getUrl() }}" style="width:100%;height:225px;cursor: pointer;">
                    <div class="image-modal"
                        style="width:100%;height:100%;background-color:#322e2ece;position:absolute;top:0;display:flex; align-items:center;justify-content:center;visibility:hidden">
                        <button type="button" class="btn btn-primary image-src" src="{{ $image->getUrl() }}">View</button>
                        <form action="{{ route('futsal.delete', ['id' => $image->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="margin-left:10px;">Delete</button>
                        </form>

                    </div>
                </div>
            @endforeach

        </div>
        <form action="{{ route('futsal.gallery') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="d-flex flex-column" style="height: 80px;
            justify-content: space-between;">
                <input type="file" name="image"style="width:300px;" multiple>
                <button type="submit" value="save" class="btn btn-success" style="width:200px;">Upload</button>
            </div>
            {{-- <input type="submit" value="save"> --}}
        </form>

    </div>
    <div id="picture-modal" class="d-none"
        style="position:fixed;top:0;width:100vw;height:100vh; background-color:#322e2ece; z-index:10; display:flex;align-items:center;justify-content:center;">
        <img id="picture" src="" style="width:auto; height:400px; border-radius:20px;" />
    </div>
@endsection
