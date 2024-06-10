<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Post;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Komentar;

class FeedbackController extends Controller
{
    public function UserFeedback()
    {
        $kategori=Kategori::all();
        $komentar=Komentar::all();
        return view('User.feedback',compact('kategori','komentar'));
    }
    public function komentar(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'pesan' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'pesan.required' => 'Pesan wajib diisi',
        ]);

        if (auth()->check()) {
            $komentar = new Komentar;
            $komentar->user_id = auth()->user()->id;
            $komentar->email = $request->input('email');
            $komentar->pesan = $request->input('pesan');
            $komentar->save();

            return redirect()->back()->with('success', 'Komentar berhasil dikirim');
        } else {
            return redirect('/login')->with('error', 'Anda harus login untuk memberikan komentar');
        }
    }
}
