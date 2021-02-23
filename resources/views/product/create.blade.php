@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/product" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <h1>Add New Product</h1>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Product Name</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
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
                <input id="description" type="text" name="description" class="form-control @error('description') is-invalid @enderror" required autocomplete="description" autofocus>
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
                <input id="price" type="number" name="price" class="form-control @error('price') is-invalid @enderror" required autocomplete="price" autofocus>
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
            <button class="btn btn-primary">Add New Product</button>
        </div>

    </form>
</div>
@endsection
