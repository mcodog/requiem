<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Branch;
use View;

class ForTrialController extends Controller
{
    public function confirm() {
        $branch = Branch::all();
        return View::make('tryingapi', compact('branch'));
    }

    public function cart() {
        $products = Product::all();
        return View::make('cart', compact('products'));
    }
}
