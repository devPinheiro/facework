<?php

namespace App\Http\Controllers;

use App\terms;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('terms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('terms.create');
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
        $this->validate($request, [
            'body' => 'required'
        ]);
        $term = terms::create([
            'body' => $request->body
        ]);
        
        return redirect()->back()->with('flash_message', 'Terms and Conditions created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function show(terms $terms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function edit(terms $terms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, terms $terms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\terms  $terms
     * @return \Illuminate\Http\Response
     */
    public function destroy(terms $terms)
    {
        //
    }
}
