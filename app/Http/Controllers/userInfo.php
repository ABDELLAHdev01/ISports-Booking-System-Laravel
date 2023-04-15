<?php

namespace App\Http\Controllers;

use App\Models\coach;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class userInfo extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::find(Auth::user()->id);
        // all coaches but only last 3
        $coaches = coach::all()->take(3);
        // all courses but only last 3
        $courses = Course::all()->take(3);
        // return
        return view('user.dashboard', compact('user', 'coaches', 'courses'));
        
      
        
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(request $request)
    {
        //
        return view('user.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function quizend(Request $request){
        // change user quizstatus to 1
        $user = User::find(Auth::user()->id);
        $user->quizstatus = 1;
        $user->bmi = $request->bmi;
        $user->save();
        // redirect to dashboard
        return redirect()->route('dashboard')->with('status', 'Your quiz has been submitted successfully !');
     }
    public function update(Request $request)
    {
        // edit user info 
        // User::update($request->all());
        // validate
        $request->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
     
        ]);
        $User = User::find(Auth::user()->id);
        $input = $request->all();

        //image
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
 
            //hey
        }

        // $request->user()->fill($request->all());

        $User->update($input);
        return redirect()->back()->with('status', 'your profile has been updated successfully !');

        
    }
    public function changepassword(Request $request)
    {
        // edit password
        $User = User::find(Auth::user()->id);

        // $input = $request->all();
// print_r(Auth::user()->password);
// print_r($request->oldpassword);

        if ((Hash::check($request->oldpassword, Auth::user()->password))) {
            // The passwords matches
            
              if($request->newpassword == $request->repeatpassword){
                $User->password = bcrypt($request->newpassword);
                $User->save();
                return redirect()->back()->with("success","Password changed successfully !");
            }else{
                return redirect()->back()->with("error","Your new password does not matches with the repeat password you provided. Please try again.");
            }
            // return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }else{
             return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
            
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
     // destroy user account
     $User = User::find(Auth::user()->id);
        $User->delete();
        return redirect()->route('login')->with('status', 'your account has been deleted successfully !');


    }
}