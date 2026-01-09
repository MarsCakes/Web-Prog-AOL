<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function adminIndex()
    {
        return 'MITRA LIST OK';
    }

    public function approve($id)
    {
        return 'MITRA ' . $id . ' APPROVED';
    }
    
    // public function index()
// {
//     // Ambil data mitra yang perlu approval (misalnya status 'pending')
//     // Ganti 'Mitra' dengan nama model kamu jika berbeda
//     $mitras = Mitra::where('status', 'pending')->get(); // Atau query sesuai kebutuhan

//     // Kembalikan view dengan data
//     return view('mitra.index', compact('mitras'));
// }
 }
