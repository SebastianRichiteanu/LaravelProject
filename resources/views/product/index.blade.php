@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($products as $product)
        Name: {{ $product->name}} <br>
        Price: {{ $product->price}} <br>
        Description: {{ $product->description}} <br>
        Available: {{ $product->available}} <br>
        <a href="/product/{{$product->id}}">Show Product</a> <br>
        <a href="/product/{{$product->id}}/edit">Edit Product</a> <br> 
        <br> <br>
    @endforeach
    <a href="/product/create">Add new Product</a>
</div>

@endsection
