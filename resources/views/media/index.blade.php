@extends('layouts.admin')

@section('content')
    <h1>Daftar Media</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Id</th>
          <th scope="col">Nama</th>
          <th scope="col">Dibuat tanggal</th>
            <th scope="col"></th>
            <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
      @if($banyakPhoto)
          @php
          $hitung = 1;
          @endphp
          @foreach($banyakPhoto as $photo)
        <tr>
            <td>{{$hitung}}</td>
            <td>{{$photo->id}}</td>
            <td>{{$photo->lokasi_file}}</td>
            <td>{{$photo->created_at}}</td>
            <td><img src="{{$photo->lokasi_file}}" height="75" width="75"></td>
            <td>
                <form action="{{action('AdminMediaController@destroy', $photo->id)}}" method="POST">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" value="Hapus" class="btn btn-danger">
                </form>

            </td>
        </tr>
        @php
            $hitung++;
        @endphp

          @endforeach
      @endif
      </tbody>
    </table>
    @endsection