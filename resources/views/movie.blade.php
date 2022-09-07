@extends('layouts.dashboard')

@section('title')
adminpanel
@endsection()


@section('companyName')
    تلاونگ اردبیل
@endsection()


@section('main')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">movie</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{ route('adminpanel.movie.input') }}"><button type="button" class="btn btn-sm btn-outline-secondary">ساخت</button></a>
                </div>
            </div>
        </div>

        <canvas class="my-4 w-100" id="myChart" width="900" height="20"></canvas>

@endsection()
@section("content")
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col"> فیلم</th>
            <th scope="col">عنوان </th>
            <th scope="col">توضیحات</th>
            <th scope="col"> متن 1</th>
            <th scope="col">متن 2</th>
            <th scope="col"> 3 متن </th>
            <th scope="col"> وضعیت انتشار </th>
            <th scope="col">اصلاح </th>
            <th scope="col">حذف </th>

        </tr>
    </thead>
    <tbody>


        @foreach($data as $key=>$dat)

        <tr>
            <td scope="row">{{ $dat['id'] }}</td>
            <td style="width:15vh; height: 15vh; " ><video width="100" height="60" controls>
                <source src="{{ Storage::url($dat['url']) }}" type="video/mp4">
                <source src="{{ Storage::url($dat['url']) }}" type="video/ogg">
            </video></td>
            <td>{{ $dat['name'] }}</td>
            <td>{{ $dat['title'] }}</td>
            <td>{{ $dat['text1'] }}</td>
            <td>{{ $dat['text2'] }}</td>
            <td>{{ $dat['text3'] }}</td>
            <td>{{ $dat['status'] }}</td>
            <td hidden>
                {{
        $dat['id_id']=$dat['id']
      }}
            </td>
            <td><a href="{{ route('adminpanel.movie.edit',['id',$dat]) }}"><button type="button" class="btn btn-primary">اصلاح</button></a></td>
            <td><a href="{{ route('adminpanel.movie.delete',['id',$dat]) }}"><button type="button" class="btn btn-danger">حذف</button></a></td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection()