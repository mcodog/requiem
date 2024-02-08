<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Redirect;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return View::make('products.index', compact('products'));
    }

    public function create()
    {
        $category = Category::all();
        return View::make('products.create', compact('category'));
    }

    public function store(Request $request)
    {
        $description = $request->description;
        $price = $request->price;
        $categoryId = $request->categoryId;
        $product = new Product();
        $product->description = $description;
        $product->category_id = $categoryId;
        $product->price = $price;
        
        $product->save();
        return Redirect::to('products');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $category = Category::where('id', $product->category_id)->first();
        $categories = Category::all();
        return View::make('products.edit', compact('product', 'category', 'categories'));
    }

    
}
