<?php 

namespace App\View;

use Illuminate\View\View;
use App\Category;

class FooterCategory
{
	public function compose(View $view) 
	{
		$categories = Category::all();
		$view->with('footer_category', $categories);
	}
}