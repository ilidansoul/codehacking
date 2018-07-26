@extends('layouts.admin')

@section('content')
    <h1>Ubah Post</h1>

    <div class="row">
        
        <div class="col-sm-3">
            <img height="1" src="{{$post->photo->lokasi_file}}" alt="" class="img-responsive">
        </div>

        <div class="col-sm-9">
    <form action="{{action('AdminPostsController@update', $post->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label>Judul</label>
            <input value="{{$post->title}}" name="judul" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Konten</label>
            <textarea name="konten" rows="10" class="form-control">{{$post->content}}</textarea>
        </div>
        <div class="form-group">
            <label>Kategori</label>
            <select name="kategori" class="form-control">
                @if($banyakKategori)
                    @foreach($banyakKategori as $kategori)
                        <option value="{{$kategori->id}}">{{$kategori->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
            <label>Photo</label>
            <input name="photo" type="file">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" value="Simpan" type="submit" name="buat post" >
        </div>
    </form>

    <form method="POST" action="{{action('AdminPostsController@destroy', $post->id)}}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Hapus">
    </form>
        </div>
    </div>

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
