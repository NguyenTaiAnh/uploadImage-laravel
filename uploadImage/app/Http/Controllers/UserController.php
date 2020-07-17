<?php

namespace App\Http\Controllers;

use App\users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = users::all();
        return view('index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = users::select('name','email','country','image')->get();
        return view('add',compact('user'));
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
            'name'=> 'required',
            'email'=> 'required',
            'country'=>'required',
        ]);
        $user  = new users();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->country = $request['country'];
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            // Thư mục upload
            $path =public_path() . '/assets/images';
            // Bắt đầu chuyển file vào thư mục
            $image->move($path,$name);
            $user->image =$name;

        }
        $user->save();
        return redirect()->route('user.index')->with('success');
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
        $user = users::find($id);
        return view('show',compact('user'));
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
        $user = users::find($id);
        return view('edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, users $user)
    {
        //
        $user->update([
            'name' => $request['name'],
            'email'=>$request['email'],
            'country'=>$request['country']
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            // Thư mục upload
            $path =public_path() . '/assets/images';
            // Bắt đầu chuyển file vào thư mục
            $image->move($path,$name);
            $user->image =$name;

        }
        $user->save();
        return redirect()->route('user.index')->with('successs');
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
        $user = users::find($id);
        $user->delete();
        return redirect()->route('user.index');
    }
}
