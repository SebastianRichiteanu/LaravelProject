<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = \Request::get('sort');

        $products = Product::where([
            [function ($query) use ($request) {
                if (($src = $request->src)) {
                    $query->orWhere('name','like','%'.$src.'%')->get();
                }
            }]
        ])->paginate(10);

        if ($sort == 1) {
            $products = $products->sortBy('price');
        }else if ($sort == 2) {
            $products = $products->sortByDesc('price');
        }

        $products = $products->toJson();
       // dd($products);
       // dd(json_decode($products)->data);
        return view('products/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => ['required', 'image'],
            'available' => 'required',
        ]);
        $imgPath = request('image')->store('uploads', 'public');

        Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'description' => $data['description'],
            'image' => $imgPath,
            'available' => $data['available'],
        ]);

        return redirect('/products/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products/show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products/edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => '',
            'available' => '',
        ]);
        $product->update($data);
        return redirect('/products/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products/index');
    }

    public function scopeSearch($q)
    {
        return empty(request()->search) ? $q : $q->where('name', 'like', '%'.request()->search.'%');
    }
}