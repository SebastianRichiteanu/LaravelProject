@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row pb-5">
        <img id="banner" src="https://seocustomer.com/wp-content/uploads/2020/05/Top-5-Push-Notifications-Templates-For-Ecommerce-Website-banner.jpg">
    </div>


    <div class="src_sort">
        <input type="text" id="src_bar" onkeyup="window.search()" placeholder="Search..">
        <a id = "p_category">
            Categories:
            <select name="category" id="category" onchange="window.category()">
                <option value="All">All</option>
                @foreach ($categories as $category) 
                    <option value="{{$category->name}}">{{$category->name}}</option>
                @endforeach
            </select>
        </a>
        <p id="p_sort">
            Sort by Price:
            <select name="sort" id="sort" onchange="window.sort()"> 
                <option value="0">Default</option>
                <option value="1">Ascending</option>
                <option value="2">Descending</option>
            </select>
        </p>
    </div>

    <br>
    <br>
    <br>
    <br>
    
    <ul class="products" id="products">
        @foreach ($products as $product)
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
                    <li>{{$product->price}}$</li>
                    <li>{{$product->description}}</li>
                    <li>{{implode(', ', $product->categories()->get()->pluck('name')->toArray())}}</li>
                    <!-- style="visibility: hidden;" -->
                </ul>
                </div>
            </a>
     
        @endforeach
    </ul>
    
</div>

@endsection