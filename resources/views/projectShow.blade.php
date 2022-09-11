

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



        <div class="row row-cols-1 row-cols-md-3 row-cols-xs-6  g-2">
            @foreach($data['project'] as $key=>$project)

            <div class="col gap-2 border-1 shadow-lg p-3 my-4 bg-body rounded" >
                <div class="card">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach(json_decode($project['File'],true) as $key=>$file)
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
               
                <div class="card-body">
                    <h5 class="card-title"><div class="d-flex justify-content-between gap-3"><div>عنوان:</div><div>{{ $project['title'] }}</div></div></h5>
                    <h6 class="card-title"><div class="d-flex justify-content-between gap-3"><div>نام گروه:</div><div>{{ $project['name'] }}</div></div></h6>
                    <p class="card-text"><div class="d-flex justify-content-between gap-3"><div> توضیحات:</div><div>{{ $project['body'] }}</div></div></p>
                </div>
                </div>
            </div>
            @endforeach
            {{ $data['project']->links() }}

        </div>

@endsection
<script>$('.carousel').carousel({
  interval: 2000
})
</script>