@extends('layouts.dashboard')

@section('title')
adminpanel
@endsection()


@section('companyName')
    تلاونگ اردبیل
@endsection()

@section('main')

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">با سلام</h1>

            <div class="btn-toolbar mb-2 mb-md-0">
                <h6>به صفحه ادمین خوش امدید</h6>

            </div>
        </div>

        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

@endsection()


