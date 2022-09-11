

@extends('layouts.customernav')




@section('content')

        <!-- Hero Start  amirreza-->

        <!-- Shape Start -->
          <!-- Hero End amirreza -->  
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->

        <!-- Partners start -->
        <section class="py-4 border-bottom">
            <div class="container">

            </div><!--end container-->
        </section><!--end section-->


        <div class="row row-cols-1 row-cols-md-3 row-cols-xs-6 g-4 ">
            @foreach($data['crop'] as $key=>$crop)

            <div class="col   d-flex justify-content-center align-content-center  shadow-lg p-3 my-5 bg-body rounded" style="box-shadow: 2px 2px 8px #E4DFDA ">
                <div class="card">
                <img src="{{ Storage::url( $crop['File'] ) }}" class="card-img-top " alt="{{ $crop['title'] }} " style=" height: 20vh">
                <div class="card-body">
                    <h5 class="card-title  d-flex justify-content-between "><div class="font-weight-bold ">عنوان:</div><div class="" >{{ $crop['title'] }}</div></h5>
                    <h6 class="card-title  d-flex justify-content-between"><div class="font-weight-bold ">نام:</div><div class="">{{ $crop['name'] }}</div></h6>
                    <p class="card-text "><div class="d-flex justify-content-between gap-3"><div class="font-weight-bold ">توضیحات:</div><br><div class="">{{ $crop['body'] }}</div></div></p>
                    <p class="card-text "><div class='d-flex justify-content-between'><div class="font-weight-bold ">قیمت :</div><div class="">{{ $crop['fee'] }}</div><div class=""> تومان </div></div></p>
                </div>
                </div>
            </div>
            @endforeach
            {{ $data['crop']->links() }}
        </div>

@endsection
