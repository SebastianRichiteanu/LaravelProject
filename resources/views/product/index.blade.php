@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row pb-5">
        <img src="https://k.nooncdn.com/cms/pages/20181028/d50dc59bc7f0886dc52e4c6817424ff0/en_mb-banner-01.jpg">
    </div>
    
    <form action="/product/index" enctype="multipart/form-data" method="GET" role="search">
        @csrf
        <div class="input-group">
            <span class="input-group-btn mr-5 mt-1">
                <select name="sort" id="sort">
                    <option value="0">Default</option>
                    <option value="1">Ascending</option>
                    <option value="2">Descending</option>
                </select>
                <input type="text" class="form-control mr-2" name="src" placeholder="Search projects" id="src">
                <button class="btn btn-info" type="submit" title="Search projects"> Search </button>
            </span>        
        </div>
    </form>

    <div>
    
    <input type="text" id="src_bar" onkeyup="search()" placeholder="Search.."> 

    

    <br>
    <br>
    <br>
    <br>
    <ul id="prod_ul">
        @foreach (json_decode($products)->data as $product)
            @if ($product->available == true) 
                <li> 
                    Name: <p>{{ $product->name}}</p> <br>
                    Price: {{ $product->price}} <br>
                    Description: {{ $product->description}} <br>
                    Available: {{ $product->available}} <br>
                    <img style="width:10%; height:10%;" src="/storage/{{ $product->image }}"> <br>
                    <a href="/product/{{$product->id}}">Show Product</a> <br>
                    <a href="/product/{{$product->id}}/edit">Edit Product</a> <br> 
                    <br> <br>
                    
                </li>
            @endif
        @endforeach
    </ul>
    </div>
</div>

@endsection
