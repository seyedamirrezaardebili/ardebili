@extends('layouts.dashboard')

@section('title')
    adminpanel
@endsection()


@section('companyName')
    تلاونگ اردبیل
@endsection()

@section('main')
        <form method="post" action="{{route('adminpanel.editprofile')}}"  enctype="multipart/form-data" class='gap-3'>
            @csrf
            @method('post')
            <div class="form-group gap-3 form-row">
                <div class='col-10'>
                    <label for="name">نام شرکت</label>
                    <input class="form-control" type="text" placeholder="نام شرکت" name="name" id="name" value="@if(!empty($data)) {{ $data['name'] }} @endif">
                    <small id="NameHelp" class="form-text text-muted ">نام شرکت را به طور کامل وارد کنید.</small>
                </div>
                <div class="col-10">
                    <div class="mb-3" >
                        <label for="File" class="form-label">  لوگو شرکت را بارگذاری کنید</label>
                        <input class="form-control" type="File" id="File" name="File" >
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class='form-row  gap-3'>


                <div class="form-group col-5">
                    <label for="phone">تلفن</label>
                    <input type="text" class="form-control" name='phone' id="phone" placeholder="تلفن" value="@if(!empty($data)) {{ $data['phone'] }} @endif">
                    <small id="NameHelp" class="form-text text-muted">  تلفن ثابت شرکت را به طور کامل وارد کنید </small>
                </div>
                <div class="form-group col-5">
                    <label for="fax">دورنگار</label>
                    <input type="text" class="form-control" name="fax" id="fax" placeholder="دورنگار" value="@if(!empty($data)) {{ $data['fax'] }} @endif">
                    <small id="faxHelp" class="form-text text-muted">  دورنگار شرکت را به طور کامل وارد کنید </small>

                </div>
                <div class="form-group col-5">
                    <label for="mobile">تلفن همراه</label>
                    <input type="text" name="mobile" class="form-control" id="mobile" placeholder="تلفن همراه" value="@if(!empty($data)) {{ $data['mobile'] }} @endif">
                    <small id="mobileHelp" class="form-text text-muted">  تلفن همراه شرکت را به طور کامل وارد کنید </small>
                </div>
                <div class="form-group col-5">
                    <label for="email">پست الکترنیکی</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="پست الکترنیکی" value="@if(!empty($data)) {{ $data['email'] }} @endif">
                    <small id="emailHelp" class="form-text text-muted">  پست الکترنیکی شرکت را به طور کامل وارد کنید </small>
                </div>
            </div>
            <br>
            <br>
            <br>
            <div class='form-row gap-3'>
                <div class="form-group col-5">
                    <label for="number_project">پروژه ها</label>
                    <input type="text" class="form-control" name='number_project' id="number_project" placeholder="پروژه ها انجام شده" value="@if(!empty($data)) {{ $data['number_project'] }} @endif">
                    <small id="number_projectHelp" class="form-text text-muted">  تعداد پروژه های انجام شده وارد کنید </small>
                </div>
                <div class="form-group col-5">
                    <label for="profit">سود</label>
                    <input type="text" class="form-control" name='profit' id="profit" placeholder="سود شرکت"  value="@if(!empty($data)) {{ $data['profit'] }} @endif">
                    <small id="profitHelp" class="form-text text-muted">  میزان سود وارد کنید  وارد کنید </small>
                </div>
                <div class="form-group col-5">
                    <label for="Growth">رشد</label>
                    <input type="text" class="form-control" name='Growth' id="Growth" placeholder="درصد رشد"  value="@if(!empty($data)) {{ $data['Growth'] }} @endif">
                    <small id="GrowthHelp" class="form-text text-muted">  درصد رشد شرکت وارد کنید </small>
                </div>
                <div class="form-group col-5">
                    <label for="Fund">سرمایه</label>
                    <input type="text" class="form-control" name='Fund' id="Fund" placeholder="سرمایه شرکت"  value="@if(!empty($data)) {{ $data['Fund'] }} @endif">
                    <small id="FundHelp" class="form-text text-muted">  میزان سرمایه شرکت را وارد کنید </small>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>




            <div class="form-group gap-2">
                <label for="aboutme">درباره ما</label>
                <textarea class="form-control" id="aboutme" rows="3" name='about_me' placeholder="اطلاعاتی که می خواهید در بخش درباره ما نمایش داده شود بنویسید"  >@if(!empty($data)) {{ $data['about_me'] }} @endif</textarea>
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


   
