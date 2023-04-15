<?php

namespace App\Http\Controllers;

use App\Models\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
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
        $request->validate([
            'comment' => 'required',
        ]);
        // limit  5 comments on 1 day
        $count = comment::where('user_id', auth()->user()->id)->where('course_id', $request->course_id)->whereDate('created_at', date('Y-m-d'))->count();
        if($count >= 5){
            return back()->with('error', 'You can not comment more than 5 times a day');
        }

        $comment = new comment();
        $comment->comment = $request->comment;
        $comment->user_id = auth()->user()->id;
        $comment->course_id = $request->course_id;
        $comment->image = auth()->user()->image;
        $comment->save();
        return back();

    }

    public function deleteComment(Request $request){
        $comment = comment::find($request->id);
        $comment->delete();
        return back();
    }
       
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(comment $comment)
    {
        //
    }
}