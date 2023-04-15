<?php

namespace App\Http\Controllers;

use App\Models\demandbecoach;
use Illuminate\Http\Request;

class DemandbecoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get data where user == auth()->user()->id
        $data = demandbecoach::where('coach_id', auth()->user()->id)->get();
        return view('user.beacoach', compact('data'));
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
        // validate
        $request->validate([
            
            
            'description' => 'required',
        ]);
        $inputs = $request->all();
        $inputs['name'] = auth()->user()->name;
        $inputs['image'] = auth()->user()->image;
        $inputs['email'] = auth()->user()->email;
        $inputs['coach_id'] = auth()->user()->id;
        demandbecoach::create($inputs);
        return redirect()->back()->with('success', 'Your request has been sent successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\demandbecoach  $demandbecoach
     * @return \Illuminate\Http\Response
     */
    public function show(demandbecoach $demandbecoach)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\demandbecoach  $demandbecoach
     * @return \Illuminate\Http\Response
     */
    public function edit(demandbecoach $demandbecoach)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\demandbecoach  $demandbecoach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, demandbecoach $demandbecoach)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\demandbecoach  $demandbecoach
     * @return \Illuminate\Http\Response
     */
    public function destroy(demandbecoach $demandbecoach)
    {
        //
    }
}