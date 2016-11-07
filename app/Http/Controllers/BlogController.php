<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Blog;
use App\Http\Requests\DefaultFormRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::all();
        
        return view('default.index')
        	->with('title', 'My blog posts')
			->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = '/blog';
        
        return view('default.create')
            ->with('action', $action)
            ->with('title', 'New blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DefaultFormRequest $request)
    {
    	
    	/*
    	 * Slugify the slug field before validation
    	 */
    	$request->request->set('slug', $this->slugify($request->get('slug')));
        
        $this->validate($request, [
            'slug' => 'required|unique:slugs,slug|max:255',
            'content' => 'required',
            ]
        );
        
        $obj = new Blog();
        
        $obj->slug = $request->get('slug');
        $obj->content = $request->get('content');
        $obj->save();
        
        return \Redirect::action('HomeController@index')->with('message', 'Your blog has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = Blog::find($id);

        return view('default.view')->with('data', $data);
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function slug($slug)
    {

    	$data = Blog::where('slug', '=', $slug)->get()->first();
            
          
		return view('default.view')
            ->with('title', 'Blog detail')
            ->with('data', $data);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
