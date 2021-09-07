<?php

namespace App\Helper;
Use App\Models\Product;
use Request;
class Helper
{
	static function product_data($id)
	{	
		$product_helper = Product::where('id',$id)->first();
		return $product_helper;
	} 
}