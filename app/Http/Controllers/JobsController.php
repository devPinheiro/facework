<?php

namespace App\Http\Controllers;

use App\Http\ClearanceMiddleware;


use App\Jobs;
use App\JobsCategory;
use Illuminate\Http\Request;

class JobsController extends Controller
{

    // public function __construct() {
    //     $this->middleware(['clearance']);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jobs = Jobs::orderby('id', 'desc')->paginate(5);
        return view('job.index')->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $job_category = JobsCategory::all()->sortBy('title', SORT_NATURAL)->pluck('title','id');
        return view('job.create')->with('categories', $job_category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       //Validating input field
        $this->validate($request, [    
        'title' => 'required',
 
        'description' => 'required',
     
        'deadline_date' => 'required',
        
        ]);

        $job = Jobs::create([      
            'title' => $request->title,
            'category_id' => $request->category_id,
       
            'description' => $request->description,
           
            'deadline_date' => $request->deadline_date,
            'job_type' => $request->link,            
          
            'show' => $request->show,
        ]);

        return  redirect()->back()->with('flash_message', 'Job listing has been created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(Jobs $jobs, $id)
    {
        //
         $job = Jobs::findOrFail($id); //Find job of id = $id
         $jobs = Jobs::orderby('id', 'desc')->paginate(10);
         
        return view('job.show', compact('job','jobs'));
    }

    public function showAll(Jobs $jobs)
    {
         //
      
         $jobs = Jobs::orderby('id', 'desc')->get();
         
        return view('job.show', compact('jobs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobs $jobs)
    {
        //#//
         $job = Jobs::findOrFail($id); //Find job of id = $id     
        return view('job.edit', compact('job','jobs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //Validating input field
        $this->validate($request, [    
        'title' => 'required',
        'postion' => 'required',
        'description' => 'required',
        'experience' => 'required',
        'deadline_date' => 'required',
        'location' => 'required',
        'salary' => 'required',
        ]);

        $job = Jobs::find($id);

            
            $job = $request->title;
            $job = $request->category_id;
            $job = $request->position;
            $job = $request->description;
            $job = $request->experience;
            $job = $request->deadline_date;
            $job = $request->date_posted;
            $job = $request->job_type;            
            $job = $request->location;
            $job = $request->salary;
            $job = $request->comp_name;
            $job = $request->comp_desc;
            $job->save();

          return redirect()->back()->with('flash_message', 
            ''. $job->title.' updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jobs $jobs, $id)
    {
        //
        $job = Jobs::findOrFail($id);
        $job->delete();

        return redirect()->back()->with('flash_message',
             'successfully deleted');
    }
}
