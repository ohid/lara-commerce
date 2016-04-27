<?php 

namespace App\View;

use Illuminate\View\View;
use App\Product;

class SidebarProducts
{
	public function compose(View $view) 
	{
		$products = Product::orderByRaw("RAND()")->take(4)->get();
		$view->with('side_products', $products);
	}
}