<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Models\Artikel;
use App\Models\Masukan;
use App\Models\Harapan;
use App\Models\Janji;
use App\Models\Order;





class HomeController extends Controller
{

    
    public function show(Artikel $artikel)
    {
        return view('artikel-show', [
            'artikel' => $artikel
        ]);
    }
    
    public function index()
    {
        // $product=Product::paginate(3);
        $artikel = Artikel::all();
        return view('home.userpage',compact('artikel'));
    }
    
    public function about()
    {
        return view('home.about');
    }
    
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        
        if ($usertype == '1') {
            $total_artikel=Artikel::all()->count();
            $total_user=User::all()->count();
            return view('admin.home',compact('total_artikel','total_user'));
        } else {
            $artikel = Artikel::all();
            return view('home.userpage',compact('artikel') );
        }
    }
    
    public function add_harapan(Request $request)
    {
        $data= new Harapan;
        $data-> harapan=$request->harapan;
        $data->save();
        Alert::success('Success', 'Harapan added successfully');
        return redirect()->back();
    }

    
    public function index_harapan()
    {
        $harapans = Harapan::all();
        return view('home.tembok', compact('harapans'));
    }

    public function add_masukan(Request $request)
    {
        $data= new Masukan;
        $data-> name=$request->name;
        $data-> email=$request->email;
        $data-> subject=$request->subject;
        $data-> message=$request->message;
        $data->save();
        Alert::success('Success', 'Masukan berhasil ditambahkan');
        return redirect()->back();
    }

    public function riwayat()
    {
        $janji = Janji::all();
        $order = Order::all();
        return view('home.riwayat', compact('janji','order'));
    }

    public function add_janji(Request $request)
    {
        $data= new Janji;
        $data-> first_name=$request->first_name;
        $data-> last_name=$request->last_name;
        $data-> masalah=$request->masalah;
        $data-> nomor=$request->nomor;
        $data-> tanggal=$request->tanggal;
        $data-> keterangan=$request->keterangan;
        $data->save();
        Alert::success('Success', 'Jadwal added successfully, Silakan Buka Ke Menu Riwayat');
        return redirect()->back();
    }

    public function cancel_janji($id){
        $data=Janji::find($id);
        $data->status_jadwal="cancel";
        $data->save();
        Alert::success('Success', 'Jadwal canceled successfully');
        return redirect()->back();
    }

    public function update_janji($id)
    {
        $janji=Janji::find($id);
        return view('home.update_janji', compact('janji'));
        
    }

    public function update_janji_2(Request $request,$id)
    {
        $janji=Janji::find($id);
        $janji-> first_name=$request->first_name;
        $janji-> last_name=$request->last_name;
        $janji-> nomor=$request->nomor;
        $janji-> tanggal=$request->tanggal;
        $janji-> keterangan=$request->keterangan;
        $janji->save();
        Alert::success('Success', 'Janji Updated successfully');
        return redirect()->back();
    }
}