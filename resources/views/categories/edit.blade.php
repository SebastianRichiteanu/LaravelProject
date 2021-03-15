@extends('layouts.app')
@section('content')
<div class="container">
    <form action="/categories/{{json_decode($category)->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')
        <div class="row">
            <h1>Edit Category</h1>
        </div>
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Category Name</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? json_decode($category)->name}}" autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row">
            <button class="btn btn-primary">Edit Category</button>
        </div>

    </form>
</div>
@endsection