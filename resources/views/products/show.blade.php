@extends('layouts.app')
@section('content')
<div class="container">
    Name: {{ $product->name }} <br>
    Price: {{ $product->price }} <br>
    Description: {{ $product->description }} <br>
    Available: {{ $product->available }} <br>
    <form action="/products/{{$product->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('DELETE')
        <div class="row">
            <button class="btn btn-primary">Delete Product</button>
        </div>
    </form>
</div>
@endsection