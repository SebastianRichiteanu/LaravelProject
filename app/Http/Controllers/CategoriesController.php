<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Gate;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('categories/index', compact('categories'));
    }


    public function create()
    {
        if (Gate::denies('author-panel')) {
            return redirect(route('products.index'));
        }
        return view('categories/create');
    }

    public function store(Request $request)
    {
        if (Gate::denies('author-panel')) {
            return redirect(route('products.index'));
        }
        $data = request()->validate([
            'name' => 'required',
        ]);

        Category::create([
            'name' => $data['name'],
        ]);

        return redirect('/categories/index');
    }

    public function edit(Category $category)
    {
        $category = $category->toJson();
        if (Gate::denies('author-panel')) {
            return redirect(route('products.index'));
        }
        return view('/categories/edit',compact('category'));
        
    }

    public function update(Request $request, Category $category)
    {
        if (Gate::denies('author-panel')) {
            return redirect(route('products.index'));
        }
        $data = request()->validate([
            'name' => 'required',
        ]);
        $category->update($data);
        return redirect('/categories/index');
    }

    public function destroy(Category $category)
    {
        if (Gate::denies('author-panel')) {
            return redirect(route('products.index'));
        }
        $category->delete();
        return redirect('/categories/index');
    }
}
