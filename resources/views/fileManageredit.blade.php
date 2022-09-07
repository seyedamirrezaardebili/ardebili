@extends('layouts.dashboard')

@section('title')
    adminpanel
@endsection()

@section('companyName')
    تلاونگ اردبیل
@endsection()
@section('main')
<form method="post" action="{{ route('adminpanel.file.input') }}"  enctype="multipart/form-data" class='gap-3'>
            @csrf
            @method('put')
        <div class="form-group gap-3 form-row">
            <div class='col-10'>
                <input type="hidden" name="id" value="{{ old('id',$data[0]['id']) }}">
                <label for="name">نام</label>
                <input class="form-control" type="text" placeholder="نام فایل" name="name" id="name" value="{{ old('name',$data[0]['name']) }}">
                <small id="NameHelp" class="form-text text-muted ">نام را به طور کامل وارد کنید.</small>
            </div>
            <div class="col-10">
                <div class="mb-3" >
                    @if(!empty($data[0]['url']))
                        <img src="{{ Storage::url($data[0]['url']) }}" style="width:15vh; height: 15vh " class="rounded-circle mb-5" >
                    @endif
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
                <label for="title">عنوان</label>
                <input type="text" class="form-control" name='title' id="title" placeholder="عنوان" value="{{ old('title',$data[0]['title']) }}" >
                <small id="titleHelp" class="form-text text-muted">  عنوان را به طور کامل وارد کنید </small>
            </div>
            <div class="form-group col-5">
                <label for="status ">وضعیت انتشار را انتخاب کنید </label>
                <select class="form-select" aria-label="Default select example" name="status" id='status'>
                    <option value="published" @selected(old("status") == "published" )) >منتشر شده</option>
                    <option value="draft" @selected(old('status') == 'draft' ))>پیش نویس </option>
                </select>
            </div>
            <div class="form-group col-5">
                <label for="key ">مکان مربوط به فایل را انتخاب کنید </label>
                <select class="form-select" aria-label="Default select example" name="key" id='key'>
                    <option value="header" @selected(old('status') == 'header' )) >پس زمینه  </option>
                    <option value="down" @selected(old('status') == 'down' )) >پستر پایین</option>
                </select>
            </div>

        </div>
        <button type="submit" class="btn btn-primary">ثبت</button>
    </form>
    <canvas class="my-4 w-100" id="myChart" width="900" height="20"></canvas>

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



