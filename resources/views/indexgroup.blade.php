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


        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($data['gruop'] as $key=>$group)

            <div class="col gap-2 border-1" tyle="box-shadow: 2px 2px 8px #E4DFDA ">
                <div class="card">
                <img src="{{ Storage::url( $group['File'] ) }}" class="card-img-top" alt="{{ $group['title'] }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $group['title'] }}</h5>
                    <h6 class="card-title">{{ $group['name'] }}</h6>
                    <p class="card-text">{{ $group['body'] }}</p>
                </div>
                </div>
            </div>
            @endforeach

        </div>

@endsection
