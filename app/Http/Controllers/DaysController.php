<?php

namespace App\Http\Controllers;

use App\Models\Days;
use App\Models\Food;

use Illuminate\Http\Request;

class DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function foodstime(){
       $foods =  Food::all();
        $days = Days::all();
        return view('days', ['days'=> $days], ['foods'=> $foods]);
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
        // $input = $request->all();
        $input = $request->love;
        $id = $request->daysinp;
        $foods = implode(", ", $input);
        

        Days::where('id', $id)->update(array('foods' => "$foods"));
        return redirect()->route('dashboard');
        // print_r($input);
        // @dd("$input ");

        // echo $request->input('daysinp');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function show(Days $days)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function edit(Days $days)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Days $days)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Days  $days
     * @return \Illuminate\Http\Response
     */
    public function destroy(Days $days)
    {
        //
    }
}
