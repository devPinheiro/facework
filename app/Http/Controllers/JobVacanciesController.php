<?php

namespace App\Http\Controllers;

use App\JobVacancies;
use App\JobsCategory;
use Illuminate\Http\Request;

class JobVacanciesController extends Controller
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
        $jobs = JobVacancies::orderby('id', 'desc')->get();
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

        $job = JobVacancies::create([      
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
     * @param  \App\  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show(JobVacancies $jobs, $id)
    {
        //
         $job = JobVacancies::findOrFail($id); //Find job of id = $id
         $jobs = JobVacancies::orderby('id', 'desc')->paginate(10);
         
        return view('job.show', compact('job','jobs'));
    }

    public function showAll(JobVacancies $jobs)
    {
         //
      
         $jobs = JobVacancies::orderby('id', 'desc')->get();
         
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
         $job = JobVacancies::findOrFail($id); //Find job of id = $id     
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
       
        'description' => 'required',
        
        'deadline_date' => 'required',
        
        ]);

        $job = JobVacancies::find($id);

            
            $job = $request->title;
            $job = $request->category_id;
           
            $job = $request->description;
        
            $job = $request->deadline_date;
          
            $job = $request->link;            
           
         
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
        $job = JobVacancies::findOrFail($id);
        $job->delete();

        return redirect()->back()->with('flash_message',
             'successfully deleted');
    }
}


