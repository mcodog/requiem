<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Redirect;
Use File;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Product::all();
        $products = DB::table('product')
            ->join('category', 'category.id', '=', 'product.category_id')
            ->select('product.id', 'category.description as category_desc', 'product.description as product_name', 'product.price', 'product.img_path')
            ->orderBy('product.id', 'ASC')
            ->get();
        return View::make('products.index', compact('products'));
    }

    public function create()
    {
        $category = Category::all();
        return View::make('products.create', compact('category'));
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();

        $description = $data['description'];
        $price = $data['price'];
        $category_id = $data['categoryId'];
        $product = new Product();
        $product->description = $description;
        $product->category_id = $category_id;
        $product->price = $price;

        if(request()->has('image')){
            // $imagePath = request()->file('image')->store('product', 'public');
            $product->img_path = $data['image']->store('product', 'public');
        }
        
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

    public function update(StoreProductRequest $request, $id)
    {
        // dump($request->categoryId);
        // dump($request->price);
        // dump($request->description);
        $data = $request->validated();

        $product = Product::find($id);
        $product->description = $data["description"];
        $product->price = $data['price'];
        $product->category_id = $data['categoryId'];

        if($product->img_path == null) {
            if(request()->has('image')){
                // $imagePath = request()->file('image')->store('product', 'public');
                $product->img_path = $data['image']->store('product', 'public');
            }
        } else {
            if(request()->has('image')){
                $image_path = $product->img_path;
                Storage::delete('public/'.$image_path);
                $product->img_path = $data['image']->store('product', 'public');
            }
        }

        

        $product->save();
        return Redirect::to('products');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $image_path = $product->img_path;

        if ($image_path != null) {
            Storage::delete('public/'.$image_path);
        }

        Product::destroy($id);
        return Redirect::to('products');
    }
    
}
