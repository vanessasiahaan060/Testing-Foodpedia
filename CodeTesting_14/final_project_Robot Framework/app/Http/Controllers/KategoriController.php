<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use Illuminate\Support\STr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function create()
    {
        return view('kategori.tambah');
    }

    public function store(request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        DB::table('kategori')->insert([
            'nama' => $request['nama'],
            'slug' => STr::slug($request->nama),
            'deskripsi' => $request['deskripsi']
        ]);

        return redirect('/kategori');
    }

    public function userIndex()
{
    $kategori = Kategori::all();
    return view('struktur.navbar',compact('kategori'));
}


    public function index()
    {
        $kategori = DB::table('kategori')->get();
        return view('kategori.tampil', ['kategori' => $kategori]);
    }

    public function show($id)
    {
        $kategori = DB::table('kategori')->where('id', $id)->first();
        return view('kategori.detail', ['kategori' => $kategori]);
    }

    public function edit($id)
    {
        $kategori = DB::table('kategori')->where('id', $id)->first();
        return view('kategori.edit', ['kategori' => $kategori]);
    }

    public function update(request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        DB::table('kategori')
              ->where('id', $id)
              ->update([
                'slug' => STr::slug($request->nama),
                'nama' => $request -> nama,
                'deskripsi' => $request -> deskripsi,
            ]);
        return redirect('/kategori');
    }

    public function destroy($id)
    {
        DB::table('post')->where('kategori_id', $id)->delete();
        DB::table('kategori')->where('id', $id)->delete();
        return redirect('/kategori');
    }
}
