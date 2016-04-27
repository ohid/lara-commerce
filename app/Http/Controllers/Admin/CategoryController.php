<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Category;
use App\Http\Requests;
use App\Http\Controllers\Admin\AdminController;

class CategoryController extends AdminController
{   
    protected $categories;

    public function __construct(Category $categories) 
    {
        $this->categories = $categories;
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $categories = $this->categories->paginate(15);
        return view('backend.category.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {  
        return view('backend.category.form', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4|unique:categories'
        ]);

        $this->categories->create($request->all());
        return redirect(route('admin.category.index'))->with('status', 'New category created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categories->findorfail($id);

        return view('backend.category.form', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = $this->categories->findorfail($id);

        $this->validate($request, [
            // 'name' => ['required', 'unique:categories,name,'.$this->route('category')],
            'name' => 'required|unique:categories|min:4'
        ]);

        $category->fill($request->all())->save();
        return redirect(route('admin.category.index'))->with('status', 'Category has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->categories->findorfail($id);
        $category->delete();

        return redirect(route('admin.category.index'))->with('status', 'Category deleted');
    }

    public function confirm($id) 
    {
        $category = $this->categories->findorfail($id);
        return view('backend.category.confirm', compact('category'));
    }
}
