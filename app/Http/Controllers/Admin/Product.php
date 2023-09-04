<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\type As Type;

class Product extends Controller
{

    public function index()
    {
        return view(
            'dashboard.product',
            [
                'products' => Products::all(),
                'types' => Type::all(),
            ]
        );
    }

    public function create()
    {
        return view(
            'dashboard.product_create',
            [
                'type' => Type::all(),
            ]
        );
    }

    public function insert(Request $req)
    {

        $req->validate(
            [
                'name' => 'required',
                'type' => 'required',
                'price' => 'required',
                'image' => 'nullable|mimes:jpeg,png,jpg',
            ],
            [
                'name.required' => 'กรอกชื่อสินค้า',
                'type.required' => 'เลือกประเภทสินค้า',
                'price.required' => 'กรอกราคาสินค้า',
                'image.mimes' => 'ประเภทไฟล์ไม่ถูกต้อง',
            ]
        );

        if($req->hasFile('image')){
            $image = $req->image->store('product');
        }else{
            $image = null;
        }

        Products::create([

            'name' => $req->name,
            'type' => $req->type,
            'price' => $req->price,
            'image' => $image,

        ]);

        return redirect()->route('dashboard.product');

    }

    public function update($id=null, Request $req)
    {

        $product = Products::find($id);

        if($req->hasFile('image')){
            $image = $req->image->store('product');
        }else{
            if(!empty($product->image)){
                $image = $product->image;
            }else{
                $image = null;
            }
        }
        
        $product->update([

            'name' => $req->name,
            'type' => $req->type,
            'price' => $req->price,
            'image' => $image,

        ]);

        return redirect()->route('dashboard.product');
        
    }

}
