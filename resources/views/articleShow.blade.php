

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


        <div class="row row-cols-1 row-cols-md-3 row-cols-xs-6 g-4">
            @foreach($data['article'] as $key=>$article)

            <div class="col  border-1 d-flex justify-content-center" style="box-shadow: 2px 2px 8px #E4DFDA ">
                <div class="card">
                <img src="{{ Storage::url( $article['File'] ) }}" class="card-img-top " alt="{{ $article['title'] }} " style="width:30vh; height: 20vh">
                <div class="card-body">
                    <h5 class="card-title">{{ $article['title'] }}</h5>
                    <h6 class="card-title">{{ $article['name'] }}</h6>
                    <p class="card-text">{{ $article['body'] }}</p>
                </div>
                </div>
            </div>
            @endforeach
            {{ $data['article']->links() }}
        </div>

@endsection
