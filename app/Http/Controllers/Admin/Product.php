<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Products;

class Product extends Controller
{

    public function index()
    {
        return view(
            'dashboard.product',
            [
                'products' => Products::all(),
            ]
        );
    }

}
