<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\comment;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Course::all();
        return view('user.courses', compact('data'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $data = Course::where('name', 'like', '%'.$search.'%')->get();
        return view('user.courses', compact('data'));
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
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Course::find($id);
        $userid = User::find($data->user_id);
        $comments = comment::where('course_id', $id)->get();
        // return view('user.course', compact('data', 'comments'));
        return view('user.course', compact('data', 'comments', 'userid'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        
        // destroy course ussing id by Coursee:destr
        
    }
}