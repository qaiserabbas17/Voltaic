<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Response;
use App\Models\Product;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Route;

class CartController extends Controller
{
	public function index()
	{
        $footer = false;
		return view('cart', compact('footer'));
	}


	public function addcart($id)
    { 
        $product = Product::findOrFail($id);
        if (Cart::add($product->id, $product->name, 1, $product->price)) {
        	return redirect('cart')->with('success', 'your product has been add to basket.');
        }
        else {
        	return Redirect::back()->withErrors(['message', 'Something went wrong']);
        } 
    }

    public function removeCart($rowId) {
        Cart::remove($rowId);
        return redirect('/cart')->with('success', 'Product has been removed from cart!');
    }

    public function UpdateCart(Request $request) {
        if (Cart::update($request->rowId, $request->qty)) {
          return Response::json([
            'success' => true, 
            'message' => 'your product has been updated.', 
            'productsubtotal' => Cart::get($request->rowId)->subtotal(), 
            'subtotal' => Cart::subtotal(), 
            'total' => Cart::total(), 
            'count' => Cart::count(),
            'qty' => $request->qty, 
            'rowId' => $request->rowId
          ]);  
        }
        else {
            return Response::json(['success' => false, 'message' => 'Something went wrong']);  
        }
    }
}