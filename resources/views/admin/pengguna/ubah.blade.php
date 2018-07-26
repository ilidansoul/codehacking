@extends('layouts.admin')

@section('content')
    <h1>Ubah Pengguna</h1>
    <form action="{{action('AdminPenggunaController@update', $pengguna->id)}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label>Nama</label>
            <input name="nama" type="text" class="form-control" value="{{$pengguna->name}}">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input name="email" type="email" class="form-control" value="{{$pengguna->email}}">
        </div>
        <div class="form-group">
            <label>Kata Sandi</label>
            <input name="katasandi" type="password" class="form-control" value="">
        </div>
        <div class="form-group">
            <label>Peran</label>
            <select name="peran" class="form-control">
                @if($peran)
                    @foreach($peran as $individual)
                        <option value="{{$individual->id}}">{{$individual->name}}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input name="file" type="file">
        </div>
        <div class="form-group">
            <label>Status aktif</label>
            <select name="status" class="form-control">
                <option value="1">Aktif</option>
                <option value="0">Tidak aktif</option>
            </select>
        </div>

        <div class="form-group">
            <input class="btn btn-primary" value="Simpan" type="submit" name="buat post" >
        </div>
    </form>

    <form method="POST" action="{{action('AdminPenggunaController@destroy', $pengguna->id)}}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Hapus">
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
