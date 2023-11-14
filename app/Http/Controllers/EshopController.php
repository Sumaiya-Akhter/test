<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OthersImage;
use App\Models\Product;
use Illuminate\Http\Request;

class EshopController extends Controller
{
    public function index(){
        return view('frontEnd.home.home',[
            'categories' => Category::all(),
            'products' => Product::all()
        ]);
    }
    public function products(){
        return view('frontEnd.product.product');
    }
    public function productDetails($id){
        return view('frontEnd.product.product-details',[
            'categories' => Category::all(),
            'product' => Product::find($id),
            'othersImage' => OthersImage::where('product_id',$id)->get()
        ]);
    }
    public function cart(){
        return view('frontEnd.cart.cart');
    }
    public function chekcout(){
        return view('frontEnd.cart.checkout');
    }
    public function userLogin(){
        return view('frontEnd.user.user-login');
    }
    public function userRegister(){
        return view('frontEnd.user.user-register');
    }
    public function userAccount(){
        return view('frontEnd.user.user-account');
    }
}
