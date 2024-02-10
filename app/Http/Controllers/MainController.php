<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class MainController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $user = Auth::user();
        dump($user);
        // return View::make('welcome', compact('user'));
    }

   public function index()
    {
        return view('welcome');
    }
}
