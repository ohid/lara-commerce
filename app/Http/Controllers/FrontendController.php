<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;
use App\Photo;
use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Product::where('slider', 'on')->get();
        $latests = Product::where('slider', null)->orderBy('id', 'DESC')->get();
        $products = Product::orderByRaw("RAND()")->take(3)->get();
        $categories = Category::all();
        $cart = \Cart::content();

        return view('frontend.home', compact('sliders', 'latests', 'cart', 'categories','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('search');

        $products = Product::where('name', 'like', '%'.$search.'%')->get();
        return view('frontend.search', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchTag(Tag $tag)
    {   
        $tag_name = $tag->name;

        $products = $tag->products;
        return view('frontend.tags', compact('tag_name', 'products'));
    }



    public function searchCategories(Category $categories)
    {   
        $cat_name = $categories->name;

        $products = $categories->products;
        return view('frontend.categories', compact('cat_name', 'products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $product = Product::findorfail($id);
        return view('frontend.single', compact('product'));
    }

    /**
     * Add item to the cart
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addToCart($id, Request $request)
    {
        $product = Product::findorfail($id);
        $product_img = Photo::where('product_id', $id)->first();
        $product_img = $product_img->paths;

        if($request->input('quantity')) {
            $quantity = $request->input('quantity');
        } else {
            $quantity = 1;
        }


        \Cart::add(array(
            'id' => $product->id, 
            'name' => $product->name, 
            'qty' => $quantity, 
            'price' => $product->price,
            'options' => array('img' => $product_img)
        ));

        return redirect('cart');
    }

    /**
     * Get to cart
     */
    public function getCart()
    {
        $cart = \Cart::content();
        return view('frontend.cart', compact('cart'));
    }

    /**
     * Remove cart item
     *
     */
    public function removeCartItem($id)
    {
        $rowId = $id;

        \Cart::remove($rowId);
        return redirect('cart');
    }

    public function shop() 
    {
        $products = Product::paginate(8);

        return view('frontend.shop', compact('products'));
    }
}
