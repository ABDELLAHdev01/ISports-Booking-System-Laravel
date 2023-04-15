<?php

namespace App\Http\Controllers;

use App\Models\User;

use App\Models\coach;
use App\Models\Course;
use App\Mail\TestEmail;
use App\Models\booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function editcoach(){
        $data = coach::where('user_id', auth()->user()->id)->first();
        return view('coach.edit', compact('data'));
    }
    public function updatecoach(Request $request){
        $data = coach::where('user_id', auth()->user()->id)->first();
        $data->name = request('name');
        $user = User::find(auth()->user()->id);

        // image
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            $data->image = $name;
            $user->image = $name;
        }
        $data->description = request('description');
        $data->price = request('price');

        $data->location = request('location');
        $data->save();
        // change also the user info
        $user->name = request('name');
        
        $user->save();
        return redirect()->back()->with('success', 'Coach updated successfully');
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

    public function acceptBooking($id){
        $booking = booking::find($id);
        $booking->status = 'accepted';
        $booking->save();
        // send email to the user that his booking has been accepted
        $details = [
            'title' => 'Booking accepted',
            'image' => 'https://thumbs.gfycat.com/ComfortableRealisticGuanaco-max-1mb.gif',
            'button' => '0',

            'body' => 'Your booking has been accepted by the coach'
            
        ];
        Mail::to($booking->email)->send(new \App\Mail\TestEmail($details));

        return redirect()->back()->with('success', 'Booking accepted');
    }

        public function rejectBooking($id){
        $booking = booking::find($id);
        $booking->status = 'rejected';
        $booking->save();
        // send email to the user that his booking has been rejected
        $details = [
            'title' => 'Booking rejected',
            'image' => 'https://media.tenor.com/YFhAP8U26GQAAAAM/rejected-stamp.gif',
            'button' => '0',

            'body' => 'Your booking has been rejected by the coach'
            
        ];
        Mail::to($booking->email)->send(new \App\Mail\TestEmail($details));

        return redirect()->back()->with('success', 'Booking rejected');
    }

    public function dashboard(){
        $data = coach::where('user_id', auth()->user()->id)->first();
        $bookings = booking::where('coach_id', $data->id)->get();
        // accepted bookings
        $accepted = booking::where('coach_id', $data->id)->where('status', 'accepted')->get();
        // pending bookings
        $pending = booking::where('coach_id', $data->id)->where('status', 'pending')->get();
        // rejected booking
        $rejected = booking::where('coach_id', $data->id)->where('status', 'rejected')->get();

        return view('coach.dashboard', compact('data', 'bookings', 'accepted', 'pending', 'rejected'));
       
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

    public function addcourse(){
        return view('coach.addcourse');
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
        $coachuser = User::find($data->user_id);
        // return
        return view('user.coach', compact('data', 'coachuser'));
        // return view('user.coach', compact('data'));
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

    public function mycourses(){
        // find course where the user_id = auth user id
        $data = Course::where('user_id', auth()->user()->id)->get();
        return view('coach.mycourses', compact('data'));
    }

    public function addacourse(Request $request){
        // validation 
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'level' => 'required',
        ]);
        $inputs = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $inputs['image'] = "$profileImage";
 
          
        }
        $inputs['user_id'] = auth()->user()->id;
        $inputs['author'] = auth()->user()->name;
      

        Course::create($inputs);
        return redirect()->route('mycourses')->with('addedd', 'Course added');
    }

    public function deletecourse($id){
        $data = Course::find($id);
        $data->delete();
        return redirect()->back()->with('deleted', 'Course deleted');
    }
    public function editcourse(request $request){
        $data = Course::find($request->id);
        return view('coach.editcourse', compact('data'));
    }
    public function updatecourse(Request $request){
        $inputs = $request->all();
        $data = Course::find($request->id);
        $data->name = $inputs['name'];
        $data->description = $inputs['description'];
        $data->level = $inputs['level'];
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $inputs['image'] = "$profileImage";
            $data->image = $inputs['image'];
          
        }
        $data->save();
        return redirect()->route('mycourses')->with('updated', 'Course updated');
    }
}