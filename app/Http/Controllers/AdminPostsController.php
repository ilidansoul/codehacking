<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banyakPost = Post::all();
        return view('admin.post.index', compact('banyakPost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banyakKategori = Category::all();

        return view('admin.post.buat', compact('banyakKategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\BuatPostCreateRequest $request)
    {
        $pengguna = Auth::user();
        $photo_id = "";
        if($photo = $request->file('photo'))
        {
            $nama = time(). $photo->getClientOriginalName();
            $photo->move('fotodirektori/', $nama);
            $buatPhoto = Photo::create(['lokasi_file'=>$nama]);
            $photo_id = $buatPhoto->id;
        }
        Post::create([
           'title'=>$request->judul,
           'content'=>$request->konten,
           'photo_id'=>$photo_id,
           'category_id'=>$request->kategori,
            'user_id'=>$pengguna->id

        ]);

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banyakKategori = Category::all();
        $post = Post::findOrFail($id);
        return view ('admin.post.ubah', compact('post', 'banyakKategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $pengguna = Auth::user();
        $photo_id = "";
        if($photo = $request->file('photo'))
        {
            $nama = time(). $photo->getClientOriginalName();
            $photo->move('fotodirektori/', $nama);
            $buatPhoto = Photo::create(['lokasi_file'=>$nama]);
            $photo_id = $buatPhoto->id;
        }
        $post->update([
            'title'=>$request->judul,
            'content'=>$request->konten,
            'photo_id'=>$photo_id,
            'category_id'=>$request->kategori,
            'user_id'=>$pengguna->id

        ]);

        return redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        unlink(public_path() . $post->photo->lokasi_file);

        $post->delete();

        return redirect('/admin/posts');
    }
}
