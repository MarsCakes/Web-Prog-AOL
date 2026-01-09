<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class MitraController extends Controller
{
    public function adminIndex()
    {
        return 'MITRA LIST OK';
    }
    public function approve($id)
    {
        DB::transaction(function () use ($id) {

            $mitra = Mitra::findOrFail($id);

            // approve mitra
            $mitra->update([
                'status' => 'approved'
            ]);

            // cari user berdasarkan email mitra
            $user = User::where('email', $mitra->email)->first();

            if ($user) {
                $user->update([
                    'role' => 'mitra'
                ]);
            }
        });

        return back()->with('success', 'Mitra approved & user role updated to mitra');
    }


    public function index()
    {
        $mitras = Mitra::where('status', 'pending')->get();
        return view('mitra', compact('mitras'));
    }
}
