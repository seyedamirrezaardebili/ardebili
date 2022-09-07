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
            @method('delete')
            <input type="hidden" name="id" id="id"  value="{{old('id',$data)}}">
            <h6>ایا مطمن از این کار هستید</h6>
            <button type="submit" class="btn btn-danger">  حذف بشه  </button>
            <a href="{{ route('adminpanel.movie') }}"><button type="button" class="btn btn-primary">  برم یک دوری بزنم می ام   </button></a>

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



