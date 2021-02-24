@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card__body">
        <div class="half">
            <div class="featured_text">
                <h1>{{$product->name}}</h1>
                <p class="price">{{$product->price}}$</p>
            </div>
            <div class="image">
                <img src="/storage/{{ $product->image }}" alt="">
            </div>
        </div>
        <div class="half">
            <div class="btn_admin">
                <div>
                    <a href="{{ url('/products/' . $product->id) . '/edit' }}" class="btn btn-primary" > Edit Product </a>
                </div>
                <form action="/products/{{$product->id}}" enctype="multipart/form-data" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="row">
                        <button class="btn btn-primary">Delete Product</button>
                    </div>
                </form>
            </div>
            <div class="description">
                <p>{{$product->description}}</p>
            </div>
        </div>
    </div>
</div>

@endsection