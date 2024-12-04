@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Dashboard</h1>
    <br>
@stop

@section('content')
        <form class="p-4 border border-primary rounded shadow">
        <div class="form-row px-3">
            <div class="form-group col-md-6">
            <label for="name">Name</label>
            <input type="text" class="form-control" placeholder="name">
            </div>
            <div class="form-group col-md-6">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" id="slug" placeholder="slug">
            </div>
        </div>
        <div class="form-group px-3">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" placeholder="descriptiion">
        </div>
        <div class="form-row px-3">
            <div class="form-group col-md-6">
            <label for="inputCity">Parent Category</label>
            <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
            <label for="inputState">State</label>
            <select id="inputState" class="form-control">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
            </div>
            <div class="form-group col-md-2">
            <label for="inputZip">Zip</label>
            <input type="text" class="form-control" id="inputZip">
            </div>
        </div>
        <div class="d-flex justify-content-end pe-3 mb-3 px-3">
            <button type="submit" class="btn btn-primary btn-lg">Sign in</button>
        </div>
    </form>
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