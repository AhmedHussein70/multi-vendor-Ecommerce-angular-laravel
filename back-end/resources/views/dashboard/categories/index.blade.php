@extends('adminlte::page')

@section('title', 'Categories')

@section('content_header')
    <h1>Categories</h1>
    <br>
@stop

@section('content')

<div class="container-fluid">
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="justify-content-center">
        <div class="col-md-12">
            <div class="d-flex justify-content-end pe-3 mb-3">
                <button type="button" onclick="window.location='{{ route('categories.create') }}'" class="btn btn-success btn-sm">Create Category</button>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col" style="width: 20%;">Slug</th>
                        <th scope="col" style="width: 30%;">Description</th>
                        <th scope="col">Parent</th>
                        <th scope="col">Status</th>
                        <th scope="col">Image</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody>
                    @if($categories->count() > 0)
                        @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->name }}</th>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->parent_id ? $category->parent_id : 'No Parent' }}</td>
                            <td>{{ $category->status }}</td>
                            <td>
                                @if($category->image)
                                    <img src="{{ asset('path_to_images/'.$category->image) }}" alt="{{ $category->name }}" width="50">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success d-inline-block me-2">Edit</a>

                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-danger d-inline-block">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="7" class="text-center">No Categories</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>


@stop

@section('css')
    {{-- Add extra stylesheets here --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="icon" type="image/png" href="{{ asset('/images/favicon.png') }}"> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@stop

@section('js')
    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this category?');
        }
    </script>
@stop