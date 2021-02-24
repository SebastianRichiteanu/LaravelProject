@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row pb-5">
        <img src="https://k.nooncdn.com/cms/pages/20181028/d50dc59bc7f0886dc52e4c6817424ff0/en_mb-banner-01.jpg">
    </div>

    <input type="text" id="src_bar" onkeyup="window.search()" placeholder="Search..">
    <select name="sort" id="sort" onchange="window.sort()"> 
        <option value="0">Default</option>
        <option value="1">Ascending</option>
        <option value="2">Descending</option>
    </select>

    <br>
    <br>
    <br>
    <br>
    
    <ul class="products" id="products">
        @foreach (json_decode($products) as $product)
            <a href="{{ url('/products/' . $product->id) }}" class="product panel">
                <div class="product-photo">
                    <div class="photo-container">
                        <div class="photo-main">
                            <img src="/storage/{{ $product->image }}" style="max-height:300px;max-width:300px;"/>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-name" id="product-name">
                        {{$product->name}}
                    </div>
                <ul class="product-description">
                    <li>{{$product->price}}</li>
                    <li>{{$product->description}}</li>
                </ul>
                </div>
            </a>
     
        @endforeach
    </ul>
    
</div>

@endsection