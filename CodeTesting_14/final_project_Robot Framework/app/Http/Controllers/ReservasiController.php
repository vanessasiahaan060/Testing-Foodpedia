<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservasiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tanggal_event' => 'required|date',
            'waktu_event' => 'required|date_format:H:i',
            'medsos' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'event' => 'required',
            'jumlah_anggota' => 'required|integer|min:2|max:30',
            'user_id' => 'required|exists:users,id',
        ]);

        Reservasi::create([
            'name' => $request->name,
            'tanggal_event' => $request->tanggal_event,
            'waktu_event' => $request->waktu_event,
            'medsos' => $request->medsos,
            'address' => $request->address,
            'phone' => $request->phone,
            'event' => $request->event,
            'jumlah_anggota' => $request->jumlah_anggota,
            'user_id' => $request->user_id,
        ]);

        // Tambahkan notifikasi pesanan baru ke admin
        $notification = new Notification();
        $notification->pesan = 'Reservasi Baru.';
        $notification->pengirim = 'system';
        $notification->penerima = 'admin';
        $notification->sent_at = now();
        $notification->save();

        return redirect()->back()->with('success', 'Pesanan tempat berhasil dibuat.');
    }
}
