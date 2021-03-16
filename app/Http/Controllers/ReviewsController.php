<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{

    public function store(Request $request)
    {
        $data = request()->validate([
            'review' => ['required','numeric','max:5'],
            'product_id' => 'required',
        ]);
        $review = Review::create([
            'review' => $data['review'],
            'user_id' => auth()->user()->id,
            'product_id' => $data['product_id'],
        ]);

        $product = Product::find($data['product_id']);
        app('App\Http\Controllers\ProductsController')->update_rating($product);
        $pid = $data['product_id'];
        return redirect()->route('products.show', [$pid]);
    }


    public function destroy(Review $review,Request $request)
    {        
        if (auth()->user()->id == $review->user_id)
            {
                $review->delete();
                $product = Product::find($request->product_id);
                app('App\Http\Controllers\ProductsController')->update_rating($product);
            }
        $pid = $request->product_id;
        return redirect()->route('products.show', [$pid]);
    }

    
}
