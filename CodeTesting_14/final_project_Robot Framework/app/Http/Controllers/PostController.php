<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Post;
use Illuminate\Support\STr;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = Post::get();
        return view('post.index', ['post' =>$post]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::get();
        return view('post.create', ['kategori' =>$kategori]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'slug' => STr::slug($request->nama),
            'deskripsi' => 'required',
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'required | image | mimes:jpg, png, jpeg',
            'kategori_id' => 'required',
        ]);

        $fileName = time().'.'.$request->thumbnail->extension();
        $request->thumbnail->move(public_path('image'), $fileName);
        $post = new Post;

        $post->nama = $request->nama;
        $post->deskripsi = $request->deskripsi;
        $post->price = $request->price;
        $post->slug = STr::slug($request->nama);
        $post->kategori_id = $request->kategori_id;
        $post->thumbnail = $fileName;

        $post->save();

        return redirect('/post');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view('post.detail', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $kategori = Kategori::get();

        return view('post.update', ['post'=>$post, 'kategori'=>$kategori]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'price' => 'required|numeric|min:0',
            'thumbnail' => 'image | mimes:jpg, png, jpeg',
            'kategori_id' => 'required',
        ]);

        $post = Post::find($id);

        if($request->has('thumbnail')){
            $path = 'image/';
            File::delete($path. $post->thumbnail);
            $fileName = time().'.'.$request->thumbnail->extension();
            $request->thumbnail->move(public_path('image'), $fileName);
            $post->thumbnail = $fileName;
            $post->save();
        }
        $post->nama = $request['nama'];  
        $post->slug = STr::slug($request->nama);
        $post->deskripsi = $request['deskripsi'];
        $post->price = $request['price'];
        $post->kategori_id = $request['kategori_id'];
        $post->save();

        return redirect('/post');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        $path = 'image/';
        File::delete($path, $post->thumbnail);
        $post->delete();

        return redirect('/post');
    }
}
