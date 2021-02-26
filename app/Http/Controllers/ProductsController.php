<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gate;

class ProductsController extends Controller
{

    public function index(Request $request)
    {
        $sort = \Request::get('sort');
        $products = Product::where('available','=','true')->get();
        $products = $products->toJson();
        return view('products/index', compact('products'));
    }

    public function create()
    {
        if (Gate::denies('author-panel')) {
            return redirect(route('products.index'));
        }
        if (Gate::denies('author-panel')) {
            return redirect(route('products.index'));
        }
        return view('products/create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('author-panel')) {
            return redirect(route('products.index'));
        }
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

    public function show(Product $product)
    {
        $product = $product->toJson();
        return view('products/show', compact('product'));
    }

    public function edit(Product $product)
    {
        $product = $product->toJson();
        if (Gate::denies('author-panel')) {
            return redirect(route('products.index'));
        }
        return view('products/edit',compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        if (Gate::denies('author-panel')) {
            return redirect(route('products.index'));
        }
        $data = request()->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'image',
        ]);
        if (array_key_exists('image',$data)) {
            $imgPath = request('image')->store('uploads', 'public');
            $data['image'] = $imgPath;
        }
        $product->update($data);
        return redirect('/products/index');
    }

    public function destroy(Product $product)
    {
        if (Gate::denies('author-panel')) {
            return redirect(route('products.index'));
        }
        $product->delete();
        return redirect('/products/index');
    }

    public function indexall()
    {
        if (Gate::denies('author-panel')) {
            return redirect(route('products.index'));
        }
        $products = Product::all();
        $products = $products->toJson();
        return view('/products/indexall', compact('products'));
    }

    public function update_status(Request $request, Product $product)
    {
        if (Gate::denies('author-panel')) {
            return redirect(route('products.index'));
        }
        $data = request()->validate([
            'available' => 'required',
        ]);
        $product->update($data);
        return redirect('/products');
    }
}