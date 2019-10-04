<?php

namespace App\Http\Controllers;

use App\Setting;
use Session;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct(){
        $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        //
        $settings = Setting::first();
        return view('Settings.setting')->with('settings', $settings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
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
            'contact_number' => 'required',
            'contact_email' => 'required',
            'site_name' => 'required',
        ]);
        $setting = Setting::create([
            'site_name' => $request->site_name,
            'contact_number' => $request->input('contact_number'),
            'contact_email' => $request->input('contact_email'),
            'address' => $request->input('address'),
            'facebook' => $request->input('facebook'),
            'twitter' => $request->input('twitter'),
            'instagram' => $request->input('instagram'),
        ]);
        
        return redirect()->back()->with('flash_message', 'Settings
              created');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $setting = Setting::first();
        $setting->site_name = $request->site_name;
        $setting->contact_number = $request->contact_number;
        $setting->contact_email = $request->contact_email;
        $setting->address = $request->address;
        $setting->address = $request->facebook;
        $setting->address = $request->twitter;
        $setting->address = $request->instagram;
        $setting->save();
        Session::flash('success', 'Settings updated');
        return redirect()->back();
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
