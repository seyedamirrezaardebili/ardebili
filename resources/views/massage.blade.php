@extends('layouts.dashboard')

@section('title')
adminpanel
@endsection()

@section('companyName')
    تلاونگ اردبیل
@endsection()

@section('main')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">massage</h1>

        </div>

        <canvas class="my-4 w-100" id="myChart" width="900" height="10"></canvas>

@endsection()
@section("content")
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col"> نام</th>
      <th scope="col">تلفن </th>
      <th scope="col">ایمیل</th>
      <th scope="col">پیام</th>
    </tr>
  </thead>
  <tbody>


    @foreach($data as $key=>$dat)

    <tr>
      <td scope="row">{{ $dat['id'] }}</td>
      <td>{{ $dat['name'] }}</td>
      <td>{{ $dat['phone'] }}</td>
      <td>{{ $dat['email'] }}</td>
      <td>{{ $dat['massage'] }}</td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $data->links() }}
@endsection()