<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use View;

class ForTrialController extends Controller
{
    public function index() {
        $branch = Branch::all();
        return View::make('tryingapi', compact('branch'));
    }
}
