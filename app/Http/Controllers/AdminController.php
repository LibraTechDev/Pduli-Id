<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function view_user()
    {
        if (auth::id()) {
            $user=User::all();
            return view('admin.user', compact('user')); 
        } 
        else {
            return redirect('login');
        }
        
    }

    public function add_user (Request $request)
    {
        $data= new User;
        $data-> name=$request->name;
        $data-> email=$request->email;
        $data-> phone=$request->phone;
        $data-> address=$request->address;
        $data-> password=bcrypt($request->password);
        $data-> role=$request->role;
        if($request->role=='admin')
        {
            $data -> usertype = $request-> usertype = 1;
        }
        else
        {
            $data -> usertype = $request-> usertype = 0;
        }
       
        $data->save();
        Alert::success('Success', 'User added successfully');
        return redirect()->back();
    }
    
    public function show_user()
    {
       if (auth::id()){
            $user=User::all();   
            return view('admin.show_user', compact('user'));
        }
        else{
            return redirect('login');
        }
    }
    public function update_user($id)
    {
        $data=User::find($id);
        return view('admin.update_user', compact('data'));
        
    }
    public function delete_user($id)
    {
        $data=User::find($id);
        $data->delete();
        Alert::success('Success', 'User deleted successfully');
        return redirect()->back();
    }
    public function update_user_2(Request $request,$id)
    {
        $data=User::find($id);
        $data->name=$request->name;
        $data->email=$request->email;
        $data->phone=$request->phone;
        $data->role=$request->role;
        if($request->role=='admin')
        {
            $data -> usertype = $request-> usertype = 1;
        }else
        {
            $data -> usertype = $request-> usertype = 0;
        }
        
        if($request->filled('password')) {
            $data->password = Hash::make($request->input('password'));
        }
        $data->save();
        Alert::success('Success', 'User Updated successfully');
        return redirect()->back();
    }

    public function search_user(Request $request)
    {
        $search_text = $request->search_user;
        $user = user::where('name', 'LIKE', "%$search_text%")->GET();
        return view('admin.show_user', compact('user'));
    }

    public function view_artikel()
    {
        if (auth::id()) {
            $artikel=Artikel::all();
            return view('admin.artikel', compact('artikel')); 
        } 
        else {
            return redirect('login');
        }
        
    }

    public function add_artikel (Request $request)
    {
        $artikel= new Artikel;
        $artikel-> title=$request->title;
        $artikel-> slug=$request->slug;
        $artikel-> ringkasan=$request->ringkasan;
        $artikel-> body=$request->body;
        $artikel ->user_id = auth()->user()->id;

        $validated = $request->validate([
            'image' => 'image|file|max:10240'
        ]);
       
        $image=$request->image;
        if($request->file('image'))
        {
            $imagePath = $validated['image'] = $request->file('image')->store('pp_artikel', 'public');
            $artikel->image = $imagePath;
        }
        
        $artikel->save();
        Alert::success('Success', 'Artikel added successfully');
        return redirect()->back();
    }
    public function show_artikel()
    {
       if (auth::id()){
            $artikel=Artikel::all();   
            return view('admin.show_artikel', compact('artikel'));
        }
        else{
            return redirect('login');
        }
    }
    public function update_artikel($id)
    {
        $artikel=Artikel::find($id);
        return view('admin.update_artikel', compact('artikel'));
        
    }
    public function delete_artikel($id)
    {
        $artikel=Artikel::find($id);
        $artikel->delete();
        Alert::success('Success', 'Artikel deleted successfully');
        return redirect()->back();
    }
    
    public function update_artikel_2(Request $request,$id)
    {
        $artikel=Artikel::find($id);
        $artikel-> title=$request->title;
        $artikel-> slug=$request->slug;
        $artikel-> body=$request->body;
        
    
        
        $validated = $request->validate([
            'image' => 'image|file|max:10240'
        ]);
       
        if ($request->file('image')) {
            // Delete the old image file from storage
            if ($artikel->image) {
                Storage::disk('public')->delete($artikel->image);
            }

            $originalName = $request->image->getClientOriginalName();
            
            $imagePath = $originalName;
            
            // Store the new image file
            $imagePath = $validated['image'] = $request->file('image')->storeAs('pp_artikel', $originalName, 'public');

            // Update the image path in the database
            $artikel->image = $imagePath;
        }
        
        
        $artikel->save();
        Alert::success('Success', 'Artikel Updated successfully');
        return redirect()->back();
    }

    public function search_artikel(Request $request)
    {
        $search_text = $request->search_user;
        $artikel = Artikel::where('title', 'LIKE', "%$search_text%")->GET();
        return view('admin.show_artikel', compact('artikel'));
    }
}