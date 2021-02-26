@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/products/{{json_decode($product)->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <h1>Edit Product</h1>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Product Name</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? json_decode($product)->name}}" autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">Product Description</label>
            <div class="col-md-6">
                <input id="description" type="text" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') ?? json_decode($product)->description}}" autocomplete="description" autofocus>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label text-md-right">Product Price</label>
            <div class="col-md-6">
                <input id="price" step="0.01" type="number" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') ?? json_decode($product)->price}}" autocomplete="price" autofocus>
                @error('price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label text-md-right">Product Image</label>
            <div class="col-md-6">
                <input id="image" type="file" class="form-control-file" id="image" name="image">
                @error('image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        <div class="row">
            <button class="btn btn-primary">Edit Product</button>
        </div>

    </form>
</div>
@endsection