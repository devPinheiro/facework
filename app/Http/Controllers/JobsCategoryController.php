<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobsCategory;

class JobsCategoryController extends Controller
{
    //
    public function create(){
         //  
         $categories = JobsCategory::all()->sortBy('title', SORT_NATURAL);      
        return view('job.jobcat')->with('categories', $categories);
    }

    public function store(Request $request){
         //Validating title and body field
            $this->validate( $request, [
               'title' => 'required',
            ]);
    
           $title = $request->title;   
    
             JobsCategory::create([      
    
                'title' => $title,
    
            ]);
    
            // Display a successful message upon save
            return redirect()->back()
                ->with('flash_message', 'new category created');
    } 
}
