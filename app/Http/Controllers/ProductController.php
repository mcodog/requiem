<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Redirect;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::all();
        $products = DB::table('product')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->select('product.id', 'category.description as category_desc', 'product.description as product_name', 'product.price')
            ->orderBy('product.id', 'ASC')
            ->get();
        // dd($products);
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
        $category_id = $request->categoryId;
        $product = new Product();
        $product->description = $description;
        $product->category_id = $category_id;
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

    public function update(Request $request, $id)
    {
        // dump($request->categoryId);
        // dump($request->price);
        // dump($request->description);
        $product = Product::find($id);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->category_id = $request->categoryId;

        $product->save();
        return Redirect::to('products');
    }

    public function delete($id)
    {
        Product::destroy($id);
        return Redirect::to('products');
    }
    
}
