@extends('layouts.dashboard')

@section('title')
adminpanel
@endsection()


@section('companyName')
    تلاونگ اردبیل
@endsection()

@section('main')
<form method="post" action="{{ route('adminpanel.group.input') }}"  enctype="multipart/form-data" class='gap-3'>
            @csrf
            @method('put')
            <div class="form-group gap-3 form-row">
                <div class='col-10'>
                    <label for="name">نام دسته بندی</label>
                    <input class="form-control" type="text" placeholder="نام دسته بندی" name="name" id="name" value="{{ old('name',$group[0]['name']) }}" >
                    <small id="NameHelp" class="form-text text-muted ">نام دسته بندی را به طور کامل وارد کنید.</small>
                </div>
                <div class="col-10">
                    <div class="mb-3" >
                        <label for="File" class="Form-label">  عکس محصول را بارگذاری کنید</label>
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
                    <input type="text" class="form-control" name='title' id="ز" placeholder="عنوان"  value="{{ old('name',$group[0]['title']) }}">
                    <small id="titleHelp" class="form-text text-muted">  عنوان محصول را به طور کامل وارد کنید </small>
                </div>
               
                <div class="form-group col-5">
                    <label for="status ">وضعیت انتشار را انتخاب کنید </label>
                    <select class="form-select" aria-label="Default select example" name="status" id='status'>
                    <option value="published" @selected(old('status') == 'published' )) >منتشر شده</option>
                    <option value="draft" @selected(old('status') == 'draft' )) >پیش نویس </option>
                    </select>
                </div>

            </div>
            <div class="form-group gap-2 col-10">
                <label for="body">اطلاعات دسته بندی را وارد کنید</label>
                <textarea class="form-control" id="body" rows="3" name='body' placeholder=" توضیحات  درمورد دسته بندی ها"  >{{ old('name',$group[0]['body']) }}</textarea>
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

