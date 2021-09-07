<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Response;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\BillingAddress;
use Auth;
use Illuminate\Support\Facades\Route;
use App\Helper\Helper;
use Mail;

class CheckoutController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	    // $this->middleware(function ($request, $next) {
	    //     $this->user = Auth::user();

	    //     return $next($request);
	    // });
	}

    public function index()
    { 
        return view('checkout');
    }

    public function checkout(Request $request)
    {   
        $user_name = Auth::user();
        // dd($user_name->firstname);die;
    	$billingData = $request->billing;
    	$billingData['customer_id'] = Auth::id();
    	$billingData['date_of_birth'] = implode('-', $billingData['date_of_birth']);
    	$billingData['mobile_num'] = implode('', $billingData['mobile_num']);
    	$BillingAddress = new BillingAddress($billingData);
        $BillingAddress->save();
        
    	$lastorderid = Order::orderBy('id', 'desc')->pluck('id')->first();
        if ($lastorderid) {
            $lastorderid = $lastorderid + 1;
        }
        else{
            $lastorderid = 1;
        }
        $con = (5 - strlen($lastorderid));
        $ordersno = 'TKS';
        for ($i=0; $i < $con; $i++) { 
            $ordersno .= '0';
        }
        $ordersno .= $lastorderid;
        $orderData = array(
            'order_no' => $ordersno,
            'customer_id' => $user_name->id,
            // 'shipping_id' => Session::get('shippingAddress'),
            'billing_id' => $BillingAddress->id,
            'coupon_id' => 0,
            'subtotal' => Cart::subtotal(),
            'tax' => Cart::tax(),
            'shipping' => Cart::getCost('shipping'),
            'discount' => Cart::getCost('discount'),
            'total' => Cart::total(),
            'status' => 0,
            'payment_status' => '1',
            'payment_id' => '123',
        );
        $order = new Order($orderData);
        $order->save();
        foreach (Cart::content() as $row){
            $product = Helper::product_data($row->id);
            
            $orderDetailData = array(
                'order_id' => $order->id,
                'product_id' => $row->id,
                'product_name' => $row->name,
                'product_image' => $product->image,
                'unit_price' => $row->price,
                'quantity' => $row->qty,
                'total' => $row->subtotal,
            );
            $OrderDetail = new OrderDetail($orderDetailData);
            $OrderDetail->save();
            
        }
        Cart::destroy();

        $user = User::where('id', $user_name->id)->first();
        $data = [
          'subject' => 'We got your order!',
          'email' => Auth::user()->email,
          'user' => $user
        ];

        Mail::send('email/order-template', $data, function($message) use ($data) {
          $message->to($data['email'])
          ->subject($data['subject']);
        });

        return redirect('/thankyou/'.$order->id);
    }

    public function thankyou($id)
    {   
        $thankyou = Order::where('id', $id)->first();
        return view('thankyou', compact('thankyou'));
    }
}