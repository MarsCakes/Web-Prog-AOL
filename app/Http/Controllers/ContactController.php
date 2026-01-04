<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactController extends Controller
{
  public function index()
  {
    $contact = [
      'whatsapp' => '+62 812-1234-5678',
      'email' => 'hello@green.local',
      'address' => 'Jl. Contoh Hijau No. 123, Jakarta',
      'mapsEmbed' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.992932327084!2d112.741!3d-7.139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwMDgnMjAuNCJTIDExMsKwNDQnMjcuNiJF!5e0!3m2!1sen!2sid!4v0000000000',
    ];
    return view('contact', compact('contact'));
  }

  public function submit(Request $request)
  {
    $data = $request->validate([
      'name' => ['required', 'string', 'max:100'],
      'email' => ['required', 'email', 'max:120'],
      'phone' => ['nullable', 'string', 'max:30'],
      'subject' => ['required', 'string', 'max:150'],
      'message' => ['required', 'string', 'max:2000'],
    ]);

    ContactMessage::create($data + [
      'ip' => $request->ip(),
      'ua' => $request->userAgent(),
    ]);

    return back()->with('success', 'Pesan kamu sudah kami terima. Terima kasih!');
  }
}
