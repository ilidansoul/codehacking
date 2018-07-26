@extends('layouts.admin')

@section('content')
    <h1>Buat Post</h1>
    <form action="{{action('AdminPostsController@store')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label>Judul</label>
            <input name="judul" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label>Konten</label>
            <textarea name="konten" rows="10" class="form-control"></textarea>
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
