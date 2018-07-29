@extends('layouts.admin')

@section('styles')
    <link rel="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    @endsection

@section('content')
    <h1>Upload Media</h1>
    <form action="{{action('AdminMediaController@store')}}" method="post" class="dropzone" enctype="multipart/form-data">
        {{csrf_field()}}
    </form>
    @endsection

@section('scripts')



    @endsection