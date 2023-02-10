<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Days;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $days = Days::all();
        $data = Food::paginate(10);
        return view('dashboard' , ['data'=> $data], ['days'=> $days]);
        //
    }

   
    public function index2()
    {
        $data = Food::all();
        return view('foods' ,['data'=> $data]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add');
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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',
            'description' => 'required',
        ]);
       
        $input = $request->all();


        
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    

        


        Food::create($input);

        return redirect()->route('dashboard')->with('message','The plate has been added');
                        
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Food::find($id);
        return view('show', ['data'=> $data]);

    }
    public function showw($id)
    {
        $data = Food::find($id);
        return view('showfood')->with('data', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data = Food::find($id);
        return view('edit',['data'=> $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $food)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'price' => 'required|numeric',
            'type' => 'required',
            'description' => 'required',
        ]);

        $food = Food::find($food);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
 
            //hey
        }

        // }else{
        //     unset($input['image']);
        // }
        $food->update($input);

        return redirect('admin')->with('message','The plate has been edited');
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Food::destroy($id);
        return redirect('admin')->with('message','The plate has been deleted');
    }
}
