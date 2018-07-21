@extends('layouts.admin')

@section('content')
    <h1>Pengguna</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Id</th>
          <th scope="col">Nama</th>
          <th scope="col">Email</th>
          <th scope="col">Role</th>
            <th scope="col">Dibuat tanggal</th>
            <th scope="col">Diperbarui tanggal</th>
            <th scope="col">Status aktif</th>
        </tr>
      </thead>
      <tbody>
      @php
      $nilai = 0;
      @endphp
      @if($pengguna)
          @foreach($pengguna as $individual)
              @php
                  $nilai ++;
              @endphp
        <tr>
          <td>{{$nilai}}</td>
          <td>{{$individual->id}}</td>
          <td>{{$individual->name}}</td>
          <td>{{$individual->email}}</td>
          <td>{{$individual->role->name}}</td>
            <td>{{$individual->created_at}}</td>
            <td>{{$individual->updated_at}}</td>
            <td>{{$individual->is_active == 1 ? 'Aktif' : 'Tidak aktif'}}</td>
        </tr>

          @endforeach
      @endif
      </tbody>
    </table>

@endsection