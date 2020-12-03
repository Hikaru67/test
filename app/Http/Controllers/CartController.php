<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;
use Cart;
session_start();

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
    	$productId = $request->productid_hidden;
    	$quanlity = $request->qty;
    	$productInfo = DB::table('tbl_product')->where('product_id', $productId)->first();
    	
    	$category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id', 'asc')->get();

        $data['id'] = $productId;
        $data['qty'] = $quanlity;
        $data['name'] = $productInfo->product_name;
        $data['price'] = $productInfo->product_price;
        $data['weight'] = '100';
        $data['options']['image'] = $productInfo->product_image;
        Cart::add($data);
        return Redirect::to('/show-cart');
        
    }
    public function show_cart()
    {
    	$category_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','1')->orderby('brand_id', 'asc')->get();

    	return view('pages.cart.show_cart')->with('category', $category_product)->with('brand', $brand_product);
    }
    public function delete_to_cart($rowId)
    {
    	Cart::update($rowId,0);
    	return Redirect::to('/show-cart');
    }
    public function update_cart_quantity(Request $request)
    {
    	$rowId = $request->rowId_cart;
    	$qty = $request->cart_quantity;
    	Cart::update($rowId, $qty);
    	return Redirect::to('/show-cart');
    }
}
