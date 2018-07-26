@extends('layouts.admin')

@section('content')
    <h1>Kategori</h1>
    <div class="row">
        <div class="col-sm-6">
            <form action="{{action('AdminPostKategoriController@store')}}" method="POST">
                {{csrf_field()}}
                <div class="form-group">
                <label>Nama Kategori</label>
                <input name="kategori" type="text" class="form-control">
                </div>
                <input type="submit" value="Simpan" class="btn btn-primary">
            </form>
        </div>
    <div class="col-sm-6">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Id</th>
              <th scope="col">Kategori</th>
              <th scope="col">Dibuat tanggal</th>
                <th scope="col">Diubah tanggal</th>
            </tr>
          </thead>
          <tbody>
          @if($banyakKategori)
              @php
              $hitung = 1;
              @endphp
              @foreach($banyakKategori as $kategori)
            <tr>
                <td>{{$hitung}}</td>
                <td>{{$kategori->id}}</td>
                <td><a href="{{route('admin.kategori.edit', $kategori->id)}}">{{$kategori->name}}</a></td>
              <td>{{$kategori->created_at}}</td>
                <td>{{$kategori->updated_at}}</td>
            </tr>
            @php
                $hitung++;
            @endphp
              @endforeach
              @endif
          </tbody>
        </table>
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