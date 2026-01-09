<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnerApplication;

class PartnerController extends Controller
{
  public function show()
  {
    return view('Mitra');
  }

  public function submit(Request $request)
  {
    $data = $request->validate([
      'name' => ['required', 'string', 'max:100'],
      'phone' => ['required', 'string', 'max:30'],
      'email' => ['nullable', 'email', 'max:120'],
      'city' => ['required', 'string', 'max:100'],
      'vehicle' => ['nullable', 'string', 'max:100'],
      'notes' => ['nullable', 'string', 'max:500'],
      'agree' => ['accepted'],
    ], [
      'agree.accepted' => 'Anda harus menyetujui syarat & ketentuan.',
    ]);

    PartnerApplication::create([
      'name' => $data['name'],
      'phone' => $data['phone'],
      'email' => $data['email'] ?? null,
      'city' => $data['city'],
      'vehicle' => $data['vehicle'] ?? null,
      'notes' => $data['notes'] ?? null,
      'agreed' => true,
      'ip' => $request->ip(),
      'ua' => $request->userAgent(),
      'status' => 'pending',
    ]);

    return back()->with('success', 'Terima kasih! Pengajuan mitra berhasil dikirim.');
  }
}
