@extends('layouts.dashboard')

@section('title')
adminpanel
@endsection()


@section('companyName')
    تلاونگ اردبیل
@endsection()

@section('main')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">project</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href='{{ route("adminpanel.project.input") }}'><button type="button" class="btn btn-sm btn-outline-secondary">ساخت</button></a>
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
            @foreach($data['project'] as $key=>$dat)

                <tr>
                    <td scope="row">{{ $dat['id'] }}</td>
                    <td class='w-200 h-100'>
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach(json_decode($dat['File'],true) as $key=>$file)
                                <div class="carousel-item active">
                                    <img src="{{ Storage::url($file) }}" alt="First slide" class="d-block w-100">
                                </div>
                             @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>
 
                    </td>
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
                    <td><a href="{{ route('adminpanel.project.edit',['id',$dat]) }}"><button type="button" class="btn btn-primary">اصلاح</button></a></td>
                    <td><a href="{{ route('adminpanel.project.delete',['id',$dat]) }}"><button type="button" class="btn btn-danger">حذف</button></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>


{{ $data['project']->links() }}
@endsection()

<script>
   $('.carousel').carousel({
  interval: 2000
})
</script>