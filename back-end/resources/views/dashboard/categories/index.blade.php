@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Dashboard</h1>
    <br>
@stop

@section('content')

<div class="d-flex justify-content-end pe-3 mb-3">
    <button type="button" onclick="window.location='{{ route('categories.create') }}'"
    class="btn btn-success btn-sm">Create Category</button>
</div>
@if($categories->count() > 0)
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">{{ $category->name }}</h5><br>
                    <hr>
                    <p class="card-text">Slug: {{ $category->slug }}</p>
                    <p class="card-text text-secondary">{{ $category->description }}</p>
                    <a href="#" class="btn btn-primary ">Edit</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@else
    <p>No Categories</p>
@endif

@stop

@section('css')
    {{-- Add extra stylesheets here --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="icon" type="image/png" href="{{ asset('/images/favicon.png') }}"> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop