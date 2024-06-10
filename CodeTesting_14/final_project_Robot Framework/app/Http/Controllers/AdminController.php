<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\Kategori;
use App\Models\Post;
use App\Models\keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Notification;


class AdminController extends Controller
{
    public function index()
    {
        $reservasi = Reservasi::all();
        $kategori = Kategori::all();
        return view('Admin.reservasi.reservasis', compact('reservasi', 'kategori'));
    }

    public function approve(Request $request, $id)
    {
        $reservasi = Reservasi::find($id);
        $reservasi->status = 'Approved';

        $notification = new Notification();
        $notification->pesan = 'Reservasi Anda Diterima.';
        $notification->pengirim = 'system';
        $notification->penerima = $reservasi->user_id;
        $notification->sent_at = now();
        $notification->save();

        $reservasi->save();

        return redirect()->back()->with('success', 'Data berhasil diapprove.');
    }
    public function reject(Request $request, $id)
    {
        $reservasi = Reservasi::find($id);
        $reservasi->status = 'Rejected';

        $notification = new Notification();
        $notification->pesan = 'Reservasi Anda Ditolak.';
        $notification->pengirim = 'system';
        $notification->penerima = '$reservasi->user_id';
        $notification->sent_at = now();
        $notification->save();

        $reservasi->save();

        return redirect()->back()->with('success', 'Data berhasil ditolak.');
    }
    public function show()
    {
        $jumlahKategori = Kategori::count();
        $jumlahMenu = Post::count();
        $jumlahPesanan = Keranjang::where('status', '1')
            ->whereDate('tanggal', Carbon::today())
            ->count();
        $jumlahReservasi = Reservasi::where('status', 'Approved')
            ->whereDate('tanggal_event', Carbon::today())
            ->count();

        $adminNotifications = DB::table('notifications')
            ->where('penerima', 'admin')
            ->where('status', 'unread')
            ->distinct()
            ->select('id', 'pesan', 'sent_at')
            ->get();

        $countNotification = $adminNotifications->count();

        return view('Admin.welcome', compact(
            'jumlahKategori',
            'jumlahMenu',
            'jumlahPesanan',
            'jumlahReservasi',
            'adminNotifications',
            'countNotification'
        ));
    }

    public function markNotificationAsRead($notificationId)
    {
        DB::table('notifications')
            ->where('id', $notificationId)
            ->update(['status' => 'read']);

        return redirect()->route('all.pesanan');
    }
}
