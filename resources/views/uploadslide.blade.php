@extends('layouts.main')

@section('content')
    <form action="{{ route('UploadSlideRequest') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- {{ csrf_field() }} -->
        <p>Upload a slide page</p>
        Tên slide <input type="text" name="titleSlide">
        <input type="file" name="fileSlide"><br>
        <input type="submit">
    </form>
@endsection
