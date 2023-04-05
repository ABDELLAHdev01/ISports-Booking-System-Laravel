<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\coach;
use App\Mail\TestEmail;
use Illuminate\Http\Request;
use App\Models\demandbecoach;
use Illuminate\Support\Facades\Mail;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = demandbecoach::orderBy('created_at', 'desc')->get();
        return view('admin.acceptcoach', compact('data'));
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
        //
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

    public function acceptcoach($id)
    {
        $data = demandbecoach::find($id);
        $data->status = "accepted";
        $data->save();
        // send notification email to user that his request has been accepted



        return redirect()->back()->with('success', 'Coach accepted successfully');
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
    public function acceptandemailing(Request $request)
    {

        $data = demandbecoach::find($request->id);
        $data->status = "accepted";
        $data->save();
        // add user to coach table
        $inputs = $request->all();
        $inputs['name'] = $data->name;
        $inputs['image'] = $data->image;
        $inputs['sport'] = $data->sport;
        $inputs['location'] = $data->location;
        $inputs['price'] = $data->price;
        $inputs['description'] = $data->description;
        $inputs['status'] = "active";
        $inputs['yearsofexperience'] = $data->yearsofexperience;
        $inputs['rating'] = 0;
        $inputs['user_id'] = $data->coach_id;
        coach::create($inputs);

        demandbecoach::destroy($request->id);

        // update role user by id
        $user = User::find($data->coach_id);
        $user->role = "coach";
        $user->save();
        
        // send notification email to user that his request has been accepted
        $mailData = [
            "name" => "$data->name",
            "dob" => "12/12/1990",
            "description" => "you are accepted as a coach",
        ];
    
        Mail::to("$data->email")->send(new TestEmail($mailData));
    
        return redirect()->back()->with('success', 'Coach accepted successfully');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
