@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Dashboard</h1>
    <br>
@stop

@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
    <form class="p-4 border border-success rounded shadow " method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-row px-3">
            <div class="form-group col-md-4">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="name" name="name">
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
                        
            </div>
            <div class="form-group col-md-6">
            <label for="slug">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="slug" name="slug" >
            @error('slug')
                <span class="text-danger">{{ $message }}</span>
            @enderror
            </div>
        </div>
        <div class="form-group px-3 col-md-10">
            <label for="description">Description</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="descriptiion" name="description" >
            @error('description')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-row px-3">
            <div class="form-group col-md-4">
            <label for="inputCity">Parent Category</label>
            <select id="inputState" class="form-control" name="parent_id">
                <option value="" selected></option>
                @if($categories->count()> 0)
                    @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                @endif
            </select>

            
            </div>  

          
            <div class="px-4 col-md-4">
            <label for="inputZip">Image</label>
            <input type="file" id="formFile" name="image">
            </div>

            <div class="form-group col-md-2">
            <label for="inputZip">Status</label>
            <input type="text" class="form-control" id="inputZip" disabled placeholder="active" name="status">
            </div>
            <div class="form-group col-md-8">
            
            </div>
        </div>
        <div class="d-flex justify-content-end pe-3 mb-3 px-3">
            <button type="submit" class="btn btn-success btn-lg">Add category</button>
        </div>
    </form>
    </div>
  </div>
</div>




        
@stop

@section('css')
    {{-- Add extra stylesheets here --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="icon" type="image/png" href="{{ asset('/images/favicon.png') }}"> 
    <link rel="stylesheet" href="{{ asset('/css/mystyle.css') }}"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop