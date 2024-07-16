<?php

namespace App\Http\Controllers;

use App\Models\View;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function index()
    {
        //
    }

    public function show(View $view)
    {
        $data = View::with('products');
    }
}
