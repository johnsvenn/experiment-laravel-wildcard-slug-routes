<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Slug;

class HomeController extends Controller
{
    public function index()
    {
       
        $data = Slug::all();
        
        return view('home.index')
        	->with('title', 'My slugs')
            ->with('data', $data);
            
            
        
    }
    
   
}
