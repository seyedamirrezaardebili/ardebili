@extends('layouts.dashboard')

@section('title')
    adminpanel
@endsection()


@section('companyName')
    تلاونگ اردبیل
@endsection()

@section('main')
    <form method="post" action="{{ route('adminpanel.movie.input') }}"  enctype="multipart/form-data" class='gap-3'>
        @csrf
        @method('put')
        <div class="form-group gap-3 form-row">
            <div class='col-10'>
                <label for="name">نام</label>
                <input class="form-control" type="text" placeholder="نام فایل" name="name" id="name" value="{{ old('name',$data[0]['name']) }}">
                <small id="NameHelp" class="form-text text-muted ">عنوان را به طور کامل وارد کنید.</small>
            </div>
            <input type="hidden"  value="{{ old('id',$data[0]['id']) }}" name="id">
            <div class='col-10'>
            <video width="200" height="120" controls>
                <source src="{{ Storage::url($data[0]['url']) }}" type="video/mp4">
                <source src="{{ Storage::url($data[0]['url']) }}" type="video/ogg">
            </video>
            </div>
            <div class="col-10">
                <div class="mb-3" >
                    <label for="File" class="form-label"> فایل را بارگذاری کنید</label>
                    <input class="form-control" type="File" id="File" name="File" >
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <div class='form-row  gap-3'>
            <div class="form-group col-5">
                <label for="title">متن اصلی</label>
                <input type="text" class="form-control" name='title' id="title" placeholder="متن اصلی" value="{{ old('title',$data[0]['title']) }}" >
                <small id="titleHelp" class="form-text text-muted">  متن اصلی را به طور کامل وارد کنید </small>
            </div>
            <div class="form-group col-5">
                <label for="title">متن اول</label>
                <input type="text" class="form-control" name='text1' id="text1" placeholder="متن"  value="{{ old('text1',$data[0]['text1']) }}" >
                <small id="titleHelp" class="form-text text-muted">  متن 1 را به طور کامل وارد کنید </small>
            </div>
            <div class="form-group col-5">
                <label for="title">متن دوم</label>
                <input type="text" class="form-control" name='text2' id="text2" placeholder="متن" value="{{ old('text2',$data[0]['text2']) }}"  >
                <small id="titleHelp" class="form-text text-muted">  متن 2 را به طور کامل وارد کنید </small>
            </div>
            <div class="form-group col-5">
                <label for="title">متن سوم</label>
                <input type="text" class="form-control" name='text3' id="text3" placeholder="متن" value="{{ old('text3',$data[0]['text3']) }}"  >
                <small id="titleHelp" class="form-text text-muted">  متن 3 را به طور کامل وارد کنید </small>
            </div>
            <div class="form-group col-5">
                <label for="status ">وضعیت انتشار را انتخاب کنید </label>
                <select class="form-select" aria-label="Default select example" name="status" id='status'>
                    <option value="published"  @selected(old('status') == 'published' )) >منتشر شده</option>
                    <option value="draft"  @selected(old('status') == 'draft' )) >پیش نویس </option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">ثبت</button>
    </form>
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

@endsection()

@if($errors->any())
@section('error')
    @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
            {{  $error  }}
        </div>
    @endforeach
@endsection
@endif



