<?php

namespace App\Http\Controllers;

use App\Models\coach;
use App\Models\booking;

use Illuminate\Http\Request;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = coach::all();
        return view('user.coaches', compact('data'));
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->all();
        // check if time or date is in the past
        if($inputs['date'] < date('Y-m-d')){
            return redirect()->back()->with('past', 'You cannot book a coach in the past');
        }
        if($inputs['date'] == date('Y-m-d') && $inputs['time'] < date('H:i')){
            return redirect()->back()->with('past', 'You cannot book a coach in the past');
        }
        // check if booking already exists
        $check = booking::where('coach_id', $inputs['coach_id'])->where('date', $inputs['date'])->where('time', $inputs['time'])->first();
        if($check){
            return redirect()->back()->with('alredy', 'You have already booked this coach at this time');
        }
        $inputs['name'] = auth()->user()->name;
        $inputs['email'] = auth()->user()->email;
        $inputs['phone'] = auth()->user()->phone;
        $inputs['sport'] = "football";
        $inputs['user_id'] = auth()->user()->id;
        $inputs['status'] = 'pending';
         
        booking::create($inputs);

        return redirect()->back()->with('success', 'Your booking has been sent to the coach');
    }


    public function search(Request $request){
        $inputs = $request->all();
        // find coaches where there names like search input or sport like search input
        $data = coach::where('name', 'like', '%'.$inputs['search'].'%')->orWhere('sport', 'like', '%'.$inputs['search'].'%')->get();
       
        return view('user.coaches', compact('data'));
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = coach::find($id);
        return view('user.coach', compact('data'));
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function edit(coach $coach)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coach $coach)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coach  $coach
     * @return \Illuminate\Http\Response
     */
    public function destroy(coach $coach)
    {
        //
    }
}
