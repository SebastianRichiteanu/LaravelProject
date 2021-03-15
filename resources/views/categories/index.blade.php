@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card table-admin">
                <div class="card-header"> 
                    Users 
                    <a href="/categories/create"> <button class="float-right btn btn-info">Add New Category</button></a>
                </div>
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
                            <td>
                                <a href="{{ route('categories.edit', $category->id) }}"> <button type="button" class="btn btn-primary float-left">Edit</button> </a>
                                <form action="{{route('categories.destroy',$category )}}" method="POST" class="float-left">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        
        </div>

    </div>

</div>

@endsection