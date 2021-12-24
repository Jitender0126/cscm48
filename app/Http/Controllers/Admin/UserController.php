<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('admin.users.index', compact('users','roles'));
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
        
    //     $user = User::findOrFail($id);  
    //     if(Auth::user()->id==$id){
    //         return redirect()->back();
    //     }

        // $this->validate($request,[
        //     'name'=>'required|max:255',
        //     'description'=>'sometimes|max:2000',
        //     'image' => 'sometimes|image|mimes:jpg,png,bmp,jpeg'
        // ]);
        // if ($request->hasFile('iamge')){
        //     $image=$request->file('image');
        //     $imageName=Str::slug('$title')::slug($request->name,'-').uniqid().'.'.$image->getClientOriginalExtension();
        //     $image->move( 'images/',$imageName);
        //     $user->image=$imageName;
        // }
        
    //     if(!Storage::disk('public')->exists('images')){
    //         Storage::disk('public')->makeDirectory('images');
    //     }

    //     $image->storeAs('images',$request->name,'public');

    //     stop user from changing its own role
        

    //     $user->role_id=$request->role;
    //     $user->image=$request->name;
    //     $user->save();

    //     return redirect()->back()->with('status','Student Image added successfully');
    // }

    public function update(Request $request, $id)
    {
        
        // stop user from changing its own role
         $user = User::findOrFail($id);  
        // if(Auth::user()->id==$id){
        //     return redirect()->back();
        // }

        if ($request->hasFile('image')){
            $image=$request->file('image');
            $imageName=Str::slug($request->name,'-').uniqid().'.'.$image->getClientOriginalExtension();
            $image->move( 'images/',$imageName);
            $user->image=$imageName;
        }
        elseif($user->image!='default.jpg'){
            $user->image=$user->image;
        }


        $user->role_id=$request->role;
        $user->save();

        return redirect()->back()->with('status','User Profile updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if(Auth::user()->id==$id){
            return redirect()->back();
        }

        $user->delete();
        return redirect()->back();
    }
}
