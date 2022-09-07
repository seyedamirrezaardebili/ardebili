@extends('layouts.customer')




@section('content')


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
        <!-- Partners End -->

        <!-- Feature Start -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title mb-4 pb-2">
                            <h4 class="title mb-4">خدماتی که ما به شما می دهیم</h4>
                            <p class="text-muted para-desc mb-0 mx-auto"> شرکت    <span class="text-primary fw-bold">تلاونگ  </span> در زمینه ی ساخت و راه اندازی گلخانه ,مرغ داری و ... در خدمت شما عزیزان هست</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->


                <div class="row">
                    @foreach($data['gruop'] as $group)
                        <div class="col-md-4 col-12 mt-5">

                        <a href="{{ route('productsgroup',$group) }}">
                            <div class="features text-center">
                                <div class="image position-relative d-inline-block">
                                    <img class=" h1 text-primary rounded-circle" style="width:12vh; Height:12vh ;" src="{{ Storage::url($group['File'])}}">
                                </div>

                                <div class="content mt-4">
                                    <h5> {{ $group['title'] }} </h5>
                                    <p class="text-muted mb-0">{{  $group['body']  }}</p>
                                </div>
                            </div>
                            </a>

                        </div><!--end col-->
                    @endforeach
                </div><!--end row-->
            </div><!--end container-->
            <div class="container mt-100 mt-60">
                <div class="row align-items-center ">
                    <div class="col-lg-5 col-md-5">
                        @foreach($data['movie'] as $file)
                                <div class="position-relative">
                                    <div class="play-icon">
                                        <a href="#!" data-type="youtube" data-id="yba7hPeTSjk" class="play-btn lightbox">
                                            <video width="320" height="240" controls class="px-4">
                                                <source src="{{ Storage::url($file['url'])}}" type="video/mp4">
                                                <source src="{{ Storage::url($file['url'])}}" type="video/ogg">
                                            </video>
                                        </a>
                                    </div>
                                </div>

                    </div><!--end col-->

                    <div class="col-lg-7 col-md-7 mt-4 pt-2 mt-sm-0 pt-sm-0 px-4">
                        <div class="section-title ms-lg-4">
                            <h4 class="title mb-4">{{ $file['name'] }}</h4>
                            <p class="text-muted"> {{ $file['ti'] }} </p>
                            <ul class="list-unstyled text-muted" >
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>{{ $file['text1'] }}</li>
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span> {{ $file['text2'] }}</li>
                                <li class="mb-0"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>{{ $file['text3'] }} </li>
                            </ul>
                        </div>
                    </div><!--end col-->
                    @endforeach
                </div><!--end row-->
            </div><!--end container-->
            <div class="container mt-100 mt-60">
                <div class="row">
                    @foreach($data['crop'] as $key=>$file)
                        <div class="col-lg-4 col-md-6 mb-4 pb-2">
                            <div class="d-flex key-feature align-items-center p-3 rounded shadow">
                                <div class=" text-center rounded-circle me-3">
                                        <img class="rounded-circle" style="width:10vh; Height:10vh ;" src="{{ Storage::url($file['File'])}}">
                                </div>
                                <div class="flex-1">
                                    <h4 class="title mb-0">{{ $file['title'] }}</h4>
                                </div>
                            </div>
                        </div><!--end col-->
                        @endforeach
                    </div><!--end container-->

            <div class="container mt-100 mt-60">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title mb-4 pb-2">
                            <h4 class="title mb-4">با <span class="text-primary">تلاونگ </span> هوشمند سرمایه گذاری کنید</h4>
                            <p class="text-muted para-desc mx-auto mb-0">  شرکت <span class="text-primary fw-bold">تلاونگ </span> با ده ها سال تجربه در زمینه مرغداری و گلخانه یک سرمایه گذاری مطمین را به شما پیشنهاد می دهد . </p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row" id="counter">
                    <div class="col-md-3 col-6 mt-4 pt-2">
                        <div class="counter-box text-center">
                            <img src="images/illustrator/Asset190.svg" class="avatar avatar-small" alt="">
                            <h2 class="mb-0 mt-4"><span class="counter-value" data-target="{{ $data['profile'][0]['Fund'] }}">{{ $data['profile'][0]['Fund'] }}</span>تومان </h2>
                            <h6 class="counter-head text-muted">سرمایه گذاری </h6>
                        </div><!--end counter box-->
                    </div>

                    <div class="col-md-3 col-6 mt-4 pt-2">
                        <div class="counter-box text-center">
                            <img src="images/illustrator/Asset189.svg" class="avatar avatar-small" alt="">
                            <h2 class="mb-0 mt-4"><span class="counter-value" data-target="{{ $data['profile'][0]['number_project'] }}">{{ $data['profile'][0]['number_project'] }}</span>+</h2>
                            <h6 class="counter-head text-muted">پروژه ها </h6>
                        </div><!--end counter box-->
                    </div>

                    <div class="col-md-3 col-6 mt-4 pt-2">
                        <div class="counter-box text-center">
                            <img src="images/illustrator/Asset186.svg" class="avatar avatar-small" alt="">
                            <h2 class="mb-0 mt-4"><span class="counter-value" data-target="{{ $data['profile'][0]['profit'] }}"> {{ $data['profile'][0]['profit'] }} </span> </h2>
                            <h6 class="counter-head text-muted">مرغداری</h6>
                        </div><!--end counter box-->
                    </div>

                    <div class="col-md-3 col-6 mt-4 pt-2">
                        <div class="counter-box text-center">
                            <img src="images/illustrator/Asset187.svg" class="avatar avatar-small" alt="">
                            <h2 class="mb-0 mt-4"><span class="counter-value" data-target="{{ $data['profile'][0]['Growth'] }}">{{ $data['profile'][0]['Growth'] }}</span></h2>
                            <h6 class="counter-head text-muted">گلخانه </h6>
                        </div><!--end counter box-->
                    </div>
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- About End -->

        <!-- CTA Start -->
      @foreach($data['file'] as $key=>$file)
          @if($file['key']=='down')
        <section class="section bg-cta" style="background: url( {{  Storage::url($file['url']) }} ) center center;" id="cta">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center">
                        <div class="section-title">
                            <h4 class="title title-dark text-white mb-4">ما طراح  و مجری پروژه ها شما هستیم.</h4>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- CTA End -->
          @endif
      @endforeach
        <!-- Price Start -->

        <!--end Price-->

        <!-- Shape Start -->

        <!--Shape End-->

@endsection
