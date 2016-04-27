<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Tag;
use App\Http\Requests;
use App\Http\Controllers\Admin\AdminController;

class TagController extends AdminController
{   
    protected $tags;

    public function __construct(Tag $tags) 
    {
        $this->tags = $tags;    
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $tags = $this->tags->paginate(15);
        return view('backend.tag.tag', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Tag $tag)
    {  
        return view('backend.tag.form', compact('tag'));
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
            'name' => 'required|min:1|unique:tags'
        ]);

        $this->tags->create($request->all());
        return redirect(route('admin.tag.index'))->with('status', 'New tag created');
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
        $tag = $this->tags->findorfail($id);

        return view('backend.tag.form', compact('tag'));
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
        $tag = $this->tags->findorfail($id);

        $this->validate($request, [
            'name' => 'required|unique:tags|min:1'
        ]);

        $tag->fill($request->all())->save();
        return redirect(route('admin.tag.index'))->with('status', 'Tag has been edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = $this->tags->findorfail($id);
        $tag->delete();

        return redirect(route('admin.tag.index'))->with('status', 'Tag deleted');
    }

    public function confirm($id) 
    {
        $tag = $this->tags->findorfail($id);
        return view('backend.tag.confirm', compact('tag'));
    }
}
