@extends('layouts.admin')

@section('content')
    <h1>Post</h1>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
            <th scope="col">Id</th>
            <th scope="col">Pengguna</th>
            <th scope="col">Kategori</th>
            <th scope="col">Photo</th>
            <th scope="col">Judul</th>
            <th scope="col">Konten</th>
            <th scope="col">Dibuat tanggal</th>
            <th scope="col">Diubah tanggal</th>
        </tr>
      </thead>
      <tbody>
      @if($banyakPost)
          @php
          $no = 1;
          @endphp
          @foreach($banyakPost as $post)
        <tr>
            <td>{{$no}}</td>
             <td>{{$post->id}}</td>
             <td>{{$post->pengguna->name}}</td>
            <td>{{$post->kategori ? $post->kategori->name : 'error'}}</td>
             <td><img height="100" width="100"
                      src="{{$post->photo ? '/post' . $post->photo->lokasi_file :
                      'fotokategori/blank-profile-picture.jpg'}}" alt=""></td>
            <td>{{$post->title}}</td>
            <td>{{$post->content}}</td>
            <td>{{$post->created_at}}</td>
            <td>{{$post->updated_at}}</td>
        </tr>
        @php
            $no++;
        @endphp
          @endforeach
      @endif
      </tbody>
    </table>
    @endsection