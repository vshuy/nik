@extends('layouts.main')

@section('content')


{{-- <div>{{$lc->name_cake}}</div> --}}


<form action="{{route('UploadCakeRequest')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- {{ csrf_field() }} -->
    <p>Upload a cake page</p>
    <select name="category">
        @foreach($listCategory as $lc)
           <option value="{{$lc->name_cake}}">{{$lc->name_cake}}</option>
        @endforeach
    </select>
    <span>Tên bánh</span>
    <input type="text" name="namecake">
    <span>Giá</span>
    <input type="text" name="cost">
    <span> VND </span>
    <input type="file" name="fileimgcake"><br><br>
    <input type="submit">
</form>
<form action="{{route('UploadCategoryRequest')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- {{ csrf_field() }} -->
    <p>Upload category</p>
    <span>Tên loại danh mục</span>
    <input type="text" name="namecake">
    <span>Mô tả</span>
    <input type="text" name="mota">
    <input type="submit">
</form>
@endsection
