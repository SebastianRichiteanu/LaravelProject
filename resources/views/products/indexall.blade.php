@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card table-author">
                <div class="card-header"> 
                    Users 
                    <a href="/products/create"> <button class="float-right btn btn-info">Add New Product</button></a>
                </div>
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Change</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(json_decode($products) as $product)
                            <tr>
                            <th scope="row">{{$product->id}}</th>
                            <td>
                                <a class="author-panel-name" href="{{ url('/products/' . $product->id)}}" > {{$product->name}} </a>
                            </td>
                            <td>{{$product->available}}</td>
                            <td>
                                <form action="/{{$product->id}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <select id="available" name="available" class="float-left @error('available') is-invalid @enderror" autocomplete="available" autofocus>
                                        <option value="true">True</option>
                                        <option value="false">False</option>
                                    </select>
                                    <button type="submit" class="float-right btn btn-success float-left">Status</button>
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