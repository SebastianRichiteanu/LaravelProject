@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/categories" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <h1>Add New Category</h1>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Category Name</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>       
        <div class="row">
            <button class="btn btn-primary">Add New Category</button>
        </div>

    </form>
</div>
@endsection