@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/@coreui/icons@2.0.0-beta.3/css/free.min.css">
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
            <div>
                Rating:
                    @if (json_decode($product)->rating == null)
                        No ratings yet!
                    @else
                        @for ($i = 1; $i <= json_decode($product)->rating; $i++) 
                            <i class="cil-star"></i>
                        @endfor
                        @if (json_decode($product)->rating - floor(json_decode($product)->rating) >= 0.5)
                            <i class="cil-star-half"></i>
                        @endif
                    @endif
            </div>
        </div>
    </div>
</div>




<div class="container reviews_panel">
    <div class="reviews">
            <div class="card table-admin">
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Review</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                            <tr>
                            <th scope="row">{{$review->user->name}}</th>
                            <td>{{$review->review}}</td>
                            <td>
                                @if ($review->user->id == auth()->user()->id)
                                    <form action="{{route('review.destroy',$review )}}" method="POST" class="float-left">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="product_id" value= {{json_decode($product)->id}} />
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endif
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
    </div>
    <div class="new">
        <form action="/reviews" enctype="multipart/form-data" method="post">
            @csrf
            <div class="row">
                <h1>Add New Review</h1>
            </div>
            <div class="form-group row">
                <label for="review" class="col-md-4 col-form-label text-md-right">Review</label>
                <div class="col-md-6">
                    <input id="review" step=1" min="1" max="5" type="number" name="review" class="form-control @error('review') is-invalid @enderror" required autocomplete="price" autofocus>
                    <input type="hidden" name="product_id" value= {{json_decode($product)->id}} />
                    @error('review')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
    
            <div class="row">
                <button class="btn btn-primary">Add New Review</button>
            </div>
    </form>

    </div>
</div>



<div class="container">
    

</div>



<div class="container">
    
</div>


@endsection