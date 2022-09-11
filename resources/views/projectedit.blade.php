@extends('layouts.dashboard')

@section('title')
    adminpanel
@endsection()

@section('companyName')
    تلاونگ اردبیل
@endsection()

@section('main')
        <form method="post" action="{{route('adminpanel.project.input')}}"  enctype="multipart/form-data" class='gap-3'>
            @csrf
            @method('put')
            <input type="hidden" name='id' value="{{ old('id',$data['project'][0]['id']) }}" >
            <div class="form-group gap-3 form-row">
                <div class='col-10'>
                    <label for="name">نام محصول</label>
                    <input class="form-control" type="text" placeholder="نام محصول" name="name" id="name" value="{{ old('name',$data['project'][0]['name']) }}">
                    <small id="NameHelp" class="form-text text-muted ">نام محصول را به طور کامل وارد کنید.</small>
                </div>
                <div class="col-10">
                    <div class="mb-3" >
                        <label for="File" class="form-label">  عکس  را بارگذاری کنید</label>
                        <input class="form-control" type="File" id="File" name="File[]" multiple >
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class='form-row  gap-3'>


                <div class="form-group col-5">
                    <label for="title">عنوان</label>
                    <input type="text" class="form-control" name='title' id="title" placeholder="عنوان"  value="{{ old('title',$data['project'][0]['title']) }}" >
                    <small id="titleHelp" class="form-text text-muted">  عنوان را به طور کامل وارد کنید </small>
                </div>


                <div class="form-group col-5">
                    <label for="status ">وضعیت انتشار را انتخاب کنید </label>
                    <select class="form-select" aria-label="Default select example" name="status" id='status'>
                    <option value="published" selected>منتشر شده</option>
                    <option value="draft">پیش نویس </option>
                    </select>
                </div>
                <div class="form-group col-5">
                    <label for="Group_id ">دسته بندی را انتخاب کنید </label>
                    <select class="form-select" aria-label="Default select example" name="group_id" id='group_id'>
                    @foreach($data['group'] as $group)  
                        <option value="{{ old('group_id',$group['id']) }}" >{{ $group['name'] }}</option>
                    @endforeach
                    </select>
                </div>

            </div>


            <div class="form-group gap-2">
                <label for="">درباره ما</label>
                <textarea class="form-control" id="body" rows="3" name='body' placeholder="اطلاعاتی که می خواهید درباره محصول نمایش داده شود بنویسید"  > value="{{ old('body',$data['project'][0]['body']) }}"</textarea>
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



