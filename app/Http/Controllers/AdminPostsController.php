<?php

namespace App\Http\Controllers;

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
        $banyakKategori = [];

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
            $photo->move('post/fotodirektori/', $nama);
            $buatPhoto = Photo::create(['lokasi_file'=>$nama]);
            $photo_id = $buatPhoto->id;
        }
        Post::create([
           'title'=>$request->judul,
           'content'=>$request->konten,
           'photo_id'=>$photo_id,
           'category_id'=>0,
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
