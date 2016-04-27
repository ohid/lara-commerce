<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Product;
use App\Photo;
use App\Tag;
use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Admin\AdminController;

class ProductController extends AdminController
{   
    protected $products;

    public function __construct(Product $products) 
    {
        $this->products = $products;    
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $products = $this->products->orderBy('id', 'DESC')->paginate(15);
        return view('backend.product.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {  
        $categories = Category::lists('name', 'id');
        $tags = Tag::lists('name', 'id');
        return view('backend.product.form', compact('product', 'tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\ProductCreateRequest $request)
    {
        
        if($request->file('slider_img')) {
            $slider_img = $request->file('slider_img');
            $slider_img_name = time() . $slider_img->getClientOriginalName();
            $slider_img_path = 'product/sliders/' . $slider_img_name;
        } else {
            $slider_img_path = ' ';
        }
        
        // Create the product
        $product = $this->createProduct($request, $slider_img_path);

        $product->save();
        if($request->file('slider_img')) {
            $slider_img->move('product/sliders', $slider_img_name);
        }


        // Attach categories and tags to product
        $product->categories()->attach($request->input('categories_list'));
        $product->tags()->attach($request->input('tag_list'));


        return redirect(route('admin.product.index'))->with('status', 'New product created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product =  $this->products->findorfail($id);

        return view('backend.product.show', compact('product'));
    }

    public function addPhoto($id, Request $request) 
    {
        // return 'working on it';
        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('product/photos', $name);

        $product = Product::getPhoto($id);
        $product->photos()->create(["paths" => "product/photos/{$name}"])->save();
        // dd($product);

        return 'done';

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->products->findorfail($id);
        $categories = Category::lists('name', 'id');
        $tags = Tag::lists('name', 'id');

        return view('backend.product.form', compact('product', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\ProductUpdateRequest $request, $id)
    {
        $product = $this->products->findorfail($id);

        $product->fill($request->all())->save();

        if($request->input('tag_list')) {
            $product->tags()->sync($request->input('tag_list'));            
        }
        if($request->input('categories_list')) {
            $product->categories()->sync($request->input('categories_list'));            
        }

        return redirect(route('admin.product.index'))->with('status', 'product has been edited');
    }

    public function createProduct($request, $slider_img_path) 
    {
        // $this->products->create($slider_img);
        $product = new Product(array(
            'name' => $request->get('name'),
            'short_title' => $request->get('short_title'),
            'offer' => $request->get('offer'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'old_price' => $request->get('old_price'),
            'slider' => $request->get('slider'),
            'slider_img' => $slider_img_path
        ));

        return $product;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->products->findorfail($id);
        
        // Delele related photos from folder
        $this->delete_photos($product);

        // Finally delete the database record
        $product->delete();

        return redirect(route('admin.product.index'))->with('status', 'product deleted');
    }

    public function confirm($id) 
    {
        $product = $this->products->findorfail($id);
        return view('backend.product.confirm', compact('product'));
    }

    public function deleteProductPhoto($id, Photo $photo)
    {
        $photo = $photo->findorfail($id);

        @unlink(public_path($photo->paths));
        $photo->delete();
        
        return redirect()->back()->with('status', 'Product photo deleted successfully');
    }

    public function delete_photos($product) 
    {
        if($product->slider_img) {
            @unlink(public_path($product->slider_img));
        }
        foreach($product->photos as $photo) {
            @unlink(public_path($photo->paths));
        }
        return true;
    }


}
