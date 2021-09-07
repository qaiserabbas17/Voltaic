<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Faq;

class HomeController extends Controller
{
	public function index()
	{
		$products = Product::get();
		$faqs = Faq::get();
		return view('index', compact('products', 'faqs'));
	}

}
