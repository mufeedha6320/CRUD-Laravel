<?php

namespace App\Http\Controllers;

use App\Models\myuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Mime\MimeTypes;

class HomeController extends Controller
{
    public function newregister(){
        return view('myblades.register');
    }
    public function mytable(){
        $data = myuser::all();
        return view('myblades.mytable',compact('data'));
    }

    public function storeFun(Request $request)
    {
        $request->validate([
            'image' => ['required','mimes:png,jpg,jpeg'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'city' => ['required'],
        ]);

        if($request->has('image')){
            $file = $request->file('image');
            $path = 'uploads/myusers';
            $extension = $file->getClientOriginalExtension();
            $filename = 'myusers'.time().'.'.$extension;
            $file->move($path,$filename);
        }

        $user = myuser::firstOrCreate(
            [
                'email' =>  request('email')],
            [
                'image' => $filename,
                'name' => request('name'),
                'email' =>  request('email'),
                'city' => request('city'),
            ]
        );
        if($user->wasRecentlyCreated){ 
            return redirect('newregister')->with('msg','new user details stored');
           }
           else {
            return redirect('newregister')->with('msg','email is already added');
           }
/*
        myuser::create([
            'image' => $filename,
            'name' => $request->name,
            'email' => $request->email,
            'city' => $request->city,
        ]);
        
        return redirect('newregister')->with('msg','new user details stored');
        */
    }
    public function update($id){
        $data = myuser::find($id);
        return view('myblades.edit',compact('data'));
    }

    public function userupdated(Request $request,$id){ 
        $request->validate([
            'image' => ['required','mimes:png,jpg,jpeg'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'city' => ['required'],
        ]);

        $data = myuser::find($id); 
        $data->name = request('name');
        $data->email = request('email');
        $data->city = request('city');
        
        if($request->has('image')){
            $file = $request->file('image');
            $path = 'uploads/myusers';
            $extension = $file->getClientOriginalExtension();
            $filename = 'myusers'.time().'.'.$extension;
            $file->move($path,$filename);
        }

        $data->image = $filename; 
        $data->update();

        if($data->isDirty()){
            return redirect('myblades.edit')->with('msg',' Ensure no input field is emptys');
            // changes have been made
        }

        return redirect()->route('newregister');
        /*
        $user = myuser::updateOrCreate(
            ['email' =>  request('email')],
            [
                'image' => request('image'),
                'name' => request('name'),
                'city' => request('city'),
            ]
        );
        if($userId->isDirty()){
            return redirect('newregister')->with('msg',' user details updated');
            // changes have been made
        }
        return view('myblades.mytable',compact('data')); */
    }


    public function userdelete(Request $request,$id){
        $user = myuser::find($id);
        $user->delete();
        return redirect()->route('mytable')->with('msg','One user deleted');
        ;
    }
}
