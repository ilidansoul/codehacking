@extends('layouts.admin')

@section('content')
    <form action="{{action('AdminPostKategoriController@update', $kategori->id)}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label>Nama Kategori</label>
            <input value="{{$kategori->name}}" name="kategori" type="text" class="form-control">
        </div>
        <input type="submit" value="Simpan" class="btn btn-primary">
    </form>
    <div class="form-group">
    <form action="{{action('AdminPostKategoriController@destroy', $kategori->id)}}" method="POST">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Hapus" class="btn btn-danger">
    </form>
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