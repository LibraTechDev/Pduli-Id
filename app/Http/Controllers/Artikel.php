<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Artikel extends Controller
{
    // public function index()
    // {
    //     $artikel = Artikel::orderBy('created_at', 'desc')->paginate(10);
    //     $jumlahartikel = Artikel::count();
    //     return view('artikel', [
    //         'artikel' => $artikel,
    //         'active' => 'artikel',
    //         'jumlahartikel' => $jumlahartikel
    //     ]);
    // }
    
    public function show(Artikel $artikel)
    {
        return view('artikel-show', [
            'artikel' => $artikel
        ]);
    }
    public function authors(User $user)
    {
        return view('artikel-show',[
            'title' => 'User Posts',
            'active' => "post",
            'posts' => $user->artikel,
        ]);
    }
}