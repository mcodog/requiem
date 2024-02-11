<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Redirect;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        // $user = Auth::user();
        return View::make('category.index', compact('categories'));
    }

    public function create()
    {
        return View::make('category.create');
    }

    public function store(Request $request)
    {
        $desc = $request->desc;
        $dsa = new Category();
        $dsa->description = $desc;

        if(request()->has('image')){
            $imagePath = request()->file('image')->store('category', 'public');
            $dsa->img_path = $imagePath;
        }
        
        $dsa->save();
        return Redirect::to('category');
    }

     public function edit($id)
    {
        $category = Category::find($id);
        return View::make('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->description = $request->description;
        $category->save();
        return Redirect::to('category');
    }

    public function delete($id)
    {
        Category::destroy($id);
        return Redirect::to('category');
    }

}
