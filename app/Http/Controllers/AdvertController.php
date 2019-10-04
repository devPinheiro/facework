<?php

namespace App\Http\Controllers;


use JD\Cloudder\Facades\Cloudder;
use App\Advert;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $advert = Advert::all();
        return view('advert.create')->with('Adverts', $advert);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) { 

            //Validating title and body field
            $this->validate($request, [
               'featured' => 'required|mimes:jpeg,bmp,jpg,png|between:1, 6000',
            ]);
    
           $image = $request->file('featured');
    
           $name = $request->file('featured')->getClientOriginalName();
    
           $image_name = $request->file('featured')->getRealPath();
           
           // uploads to cloudinary
           Cloudder::upload($image_name, null);
    
           list($width, $height) = getimagesize($image_name);

           // gets image url from cloudinary
           $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
    
    
            $advert = Advert::create([      
    
                'featured_image' => $image_url,
    
            ]);
    
            // Display a successful message upon save
            return redirect()->route('advert.create')
                ->with('flash_message', 'new advert created');
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function show(Advert $advert)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function edit(Advert $advert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advert $advert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Advert  $advert
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advert $advert)
    {
        //
    }
}
