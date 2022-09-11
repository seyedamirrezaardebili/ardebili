@extends('layouts.dashboard')

@section('title')
adminpanel
@endsection()


@section('companyName')
    تلاونگ اردبیل
@endsection()

@section('main')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Article</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href='{{ route("adminpanel.article.input") }}'><button type="button" class="btn btn-sm btn-outline-secondary">ساخت</button></a>
                </div>
            </div>
        </div>

        <canvas class="my-4 w-100" id="myChart" width="900" height="10"></canvas>

@endsection()

@section('content')

            <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col"> عکس</th>
                <th scope="col">نام محصول</th>
                <th scope="col">عنوان</th>
                <th scope="col">توضیحات</th>
                <th scope="col">وضعیت انتشار</th>
                <th scope="col">گروه بندی</th>
                <th scope="col"> اصلاح</th>
                <th scope="col">حذف </th>
                </tr>
            </thead>
            <tbody>
            @foreach($data['article'] as $key=>$dat)

                <tr>
                    <td scope="row">{{ $dat['id'] }}</td>
                    <td class='w-50 h-50'><img src="{{ Storage::url($dat['File']) }}" alt="" class="img-thumbnail"></td>
                    <td>{{ $dat['name'] }}</td>
                    <td>{{ $dat['title'] }}</td>
                    <td>{{ $dat['body'] }}</td>
                    <td>{{ $dat['status'] }}</td>
                    <td>@if(!empty( $data['group'][(int)$dat['group_id']-1])) {{ $data['group'][(int)$dat['group_id']-1]['name']}} @endif </td>
                    <td hidden>
                    {{
                        $dat['id_id']=$dat['id']
                    }}
                    </td>
                    <td><a href="{{ route('adminpanel.article.edit',['id',$dat]) }}"><button type="button" class="btn btn-primary">اصلاح</button></a></td>
                    <td><a href="{{ route('adminpanel.article.delete',['id',$dat]) }}"><button type="button" class="btn btn-danger">حذف</button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>


{{ $data['article']->links() }}
@endsection()