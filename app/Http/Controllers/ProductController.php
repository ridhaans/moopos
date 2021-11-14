<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Routing\Controller as BaseController;

class ProductController extends BaseController
{
    public function index(){
        $products=Product::where('f_account',auth()->user()->id)->paginate(8);
        $data['page_title']='Produk';
        $data['products']=$products;
        return view('dashboard',$data);
    }
}
