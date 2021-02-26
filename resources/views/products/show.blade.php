@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card__body">
        <div class="half">
            <div class="featured_text">
                <h1>{{json_decode($product)->name}}</h1>
                <p class="price">{{json_decode($product)->price}}$</p>
            </div>
            <div class="image">
                <img src="/storage/{{ json_decode($product)->image }}" alt="">
            </div>
        </div>
        <div class="half">
            @can('author-panel')
                <div class="btn_admin">
                    <div>
                        <a href="{{ url('/products/' . json_decode($product)->id) . '/edit' }}" class="btn btn-primary" > Edit Product </a>
                    </div>
                    <form action="/products/{{json_decode($product)->id}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <button class="btn btn-primary">Delete Product</button>
                        </div>
                    </form>
                </div>
            @endcan
            <div class="description">
                <p>{{json_decode($product)->description}}</p>
            </div>
        </div>
    </div>
</div>

@endsection