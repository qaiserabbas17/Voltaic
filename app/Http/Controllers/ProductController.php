<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Faq;

class ProductController extends Controller
{
	public function index($slug)
	{
		$product = Product::where('slug', $slug)->with('howitWork', 'productFaq', 'productContent', 'tags')->first();
		return view('product', compact('product'));
	}
}
