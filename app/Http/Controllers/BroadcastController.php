<?php

namespace App\Http\Controllers;

use App\Broadcast;
use Illuminate\Http\Request;

class BroadcastController extends Controller
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
        $broadcast = Broadcast::all();
        return view('broadcast.create')->with('Notifications', $broadcast);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //Validating body field
         $this->validate($request, [
            'title' => 'required'     
            ]);

            $broad = Broadcast::create([
              'title' => $request->title
            ]);

            $broad->save();

        return redirect()->back() ->with('flash_message', '
             notification sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function show(Broadcast $broadcast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $broadcast = Broadcast::findOrFail($id);

        return view('broadcast.edit', compact('broadcast'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $broadcast = Broadcast::findOrFail($id);
        $this->validate($request, [
            'title'=>'required',
        ]);
        $input = $request->all();
        $broadcast->fill($input)->save();

        return redirect()->route('broadcast.create')
            ->with('flash_message',
             'notification updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Broadcast  $broadcast
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $broadcast = Broadcast::findOrfail($id);
        $broadcast->delete();

        return redirect()->back()
        ->with('flash_message',
         'notification deleted!');
    }
}
