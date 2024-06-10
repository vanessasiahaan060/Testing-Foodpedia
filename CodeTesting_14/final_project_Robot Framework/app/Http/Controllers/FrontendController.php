<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\keranjang;
use App\Models\Reservasi;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{

    public function AllPesanan()
    {
        $kategori = Kategori::all();
        $krnjg = keranjang::get();
        $groupedOrders = $krnjg->groupBy('tanggal');
        return view('Admin.pesanan.all', compact('krnjg','kategori', 'groupedOrders'));
    }

    public function index()
    {
        $krnjg = keranjang::get();
        $kategori = Kategori::all();
        $notifications = [];

        if (auth()->check()) {
            $notifications = Notification::where('penerima', auth()->user()->id)
                ->where('status', 'unread')
                ->select('id', 'pesan')
                ->get();
        }

        return view('User.Home', compact('krnjg', 'kategori', 'notifications'));
    }

    public function markAsReadPelanggan($notificationId)
    {
        DB::table('notifications')
        ->where('id', $notificationId)
        ->update(['status' => 'read']);

    return redirect()->route('pesanan');
    }

    public function aboutus()
    {
        $kategori = Kategori::all();
        return view('User.about', compact('kategori'));
    }

    public function reservasi()
    {
        $kategori = Kategori::all();
        $reservasi = Reservasi::all();
        return view('User.reservasi', compact('kategori', 'reservasi'));
    }

    public function Kategori($slug)
    {
        $kategori = Kategori::all();
        $kategoris = Kategori::where('slug', $slug)->firstOrFail();
        $item = $kategoris->produk()->get();

        return view('User.menukategori', compact('kategori', 'item'));
    }

    public function pesanan()
    {
        $kategori = Kategori::all();
        $keranjang = keranjang::where('user_id', auth()->user()->id)->get();
        $groupedOrders = $keranjang->groupBy('tanggal');
        return view('User.daftarpesanan', compact('kategori', 'keranjang', 'groupedOrders'));
    }

    public function tambahpesanan(Request $request)
    {
        $keranjang = new keranjang;
        $keranjang->user_id = $request->user()->id;
        $keranjang->product_nama = $request->product_name;
        $keranjang->price = $request->price;
        $keranjang->tanggal = Carbon::today()->format('Y-m-d');

        $keranjang->save();

        // Tambahkan notifikasi pesanan baru ke admin
        $notification = new Notification();
        $notification->pesan = 'Pesanan Baru.';
        $notification->pengirim = 'system';
        $notification->penerima = 'admin';
        $notification->sent_at = now();
        $notification->save();

        return redirect()->route('pesanan')->with('message', 'Barang Berhasil Ditambahkan ke Keranjang');
    }

    public function deletePesanan($id)
    {
        // Logic to delete the pesanan from the database based on the $id
        // For example:
        keranjang::find($id)->delete();

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Pesanan deleted successfully.');
    }

    public function delete($id)
    {
        $reservasi = Reservasi::find($id);
        $reservasi->delete();

        return redirect()->route('pesanan');

    }

    public function statuspemesanan(Request $request, $id)
    {
        $data = Keranjang::find($id);

        if ($request->has('status')) {
            $status = $request->status;

            if ($status == 1) {
                $pesan = 'Pesanan Anda telah di-approve.';
            } elseif ($status == 2) {
                $pesan = 'Pesanan Anda telah ditolak.';
            } else {
                $pesan = 'Pesanan Anda sedang menunggu persetujuan.';
            }

            $data->status = $status;
            $data->save();

            // Retrieve the user based on user_id
            $user = User::find($data->user_id);

            // Create and save the notification for the user
            $notification = new Notification();
            $notification->pesan = $pesan;
            $notification->pengirim = 'system';
            $notification->penerima = $user->id; // Update the recipient to the user's ID
            $notification->sent_at = now();
            $notification->save();
        }

        return redirect()->back()->with('message', 'Status Pemesanan Berhasil Diubah');
    }

}
