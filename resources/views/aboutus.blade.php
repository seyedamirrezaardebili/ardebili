

@extends('layouts.customernav')




@section('content')
<section class="bg-half bg-light d-table w-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="page-next-level">
                            <h4 class="title">درباره  ما</h4>
                            <div class="page-next">
                                <nav aria-label="breadcrumb" class="d-inline-block">
                                    <ul class="breadcrumb bg-white rounded shadow mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('index') }}"> {{ $data['profile'][0]['name'] }} </a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>  <!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <br>
        <br>
        <br>
        <div class=" container">
                            <p class="text-muted"> {{ $data['profile'][0]['about_me'] }} </p>
        </div><!--end col-->


 <!-- شوع آن -->
        <section class="bg-half bg-light d-table w-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <div class="page-next-level">
                            <h4 class="title">تماس با ما</h4>
                            <div class="page-next">
                                <nav aria-label="breadcrumb" class="d-inline-block">
                                    <ul class="breadcrumb bg-white rounded shadow mb-0">
                                        <li class="breadcrumb-item"><a href="{{ route('index') }}"> {{ $data['profile'][0]['name'] }} </a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>  <!--end col-->
                </div><!--end row-->
            </div> <!--end container-->
        </section><!--end section-->
        <!-- پایان آن -->

        <!-- Shape Start -->
        <div class="position-relative">
            <div class="shape overflow-hidden text-white">
                <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!--Shape End-->

        <!-- Start Contact -->
        <section class="section pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card border-0 text-center features feature-clean">
                            <div class="icons text-primary text-center mx-auto">
                                <i class="uil uil-phone d-block rounded h3 mb-0"></i>
                            </div>
                            <div class="content mt-3">
                                <h5 class="fw-bold">تلفن </h5>
                                <p class="text-muted">   تماس  با {{$data['profile'][0]['name']}}  که می تواند همه چیز را فراهم کند</p>
                                <a href="tel:{{$data['profile'][0]['phone']}}" class="text-primary">{{$data['profile'][0]['phone']}} </a>
                            </div>
                        </div>
                    </div><!--end col-->
                    
                    <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card border-0 text-center features feature-clean">
                            <div class="icons text-primary text-center mx-auto">
                                <i class="uil uil-envelope d-block rounded h3 mb-0"></i>
                            </div>
                            <div class="content mt-3">
                                <h5 class="fw-bold">ایمیل </h5>
                                <p class="text-muted">ایمل به   {{$data['profile'][0]['name']}}  می تواند شروع جدید   باشد</p>
                                <a href="mailto:contact@example.com" class="text-primary">{{$data['profile'][0]['email']}}</a>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="col-md-4 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <div class="card border-0 text-center features feature-clean">
                            <div class="icons text-primary text-center mx-auto">
                                <i class="uil uil-envelope d-block rounded h3 mb-0"></i>
                            </div>
                            <div class="content mt-3">
                                <h5 class="fw-bold">موبایل </h5>
                                <p class="text-muted">همیشه و همه جا  تلفن همراه    {{$data['profile'][0]['name']}}       دردسترس شما عزیزان هست </p>
                                <a href="tel:{{$data['profile'][0]['mobile']}}" class="text-primary">{{$data['profile'][0]['mobile']}}</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container mt-100 mt-60">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-6 pt-2 pt-sm-0 order-2 order-md-1">
                        <div class="card shadow rounded border-0">
                            <div class="card-body py-5">
                                <h4 class="card-title">در تماس باشید !</h4>
                                <div class="custom-form mt-3">
                                    <form method="post" name="myForm" action='{{ route("adminpanel.massege.input") }}'>
                                    @csrf
                                    @method('post')
                                        <p id="error-msg" class="mb-0"></p>
                                        <div id="simple-msg"></div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">نام شما <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="user" class="fea icon-sm icons"></i>
                                                        <input name="name" id="name" type="text" class="form-control ps-5" placeholder="نام :">
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">ایمیل شما <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="mail" class="fea icon-sm icons"></i>
                                                        <input name="email" id="email" type="email" class="form-control ps-5" placeholder="ایمیل :">
                                                    </div>
                                                </div> 
                                            </div><!--end col-->
        
        
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">نظرات  <span class="text-danger">*</span></label>
                                                    <div class="form-icon position-relative">
                                                        <i data-feather="message-circle" class="fea icon-sm icons clearfix"></i>
                                                        <textarea name="massage" id="comments" rows="4" class="form-control ps-5" placeholder="پیام :"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit" id="submit" name="send" class="btn btn-primary">ارسال پیام</button>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form>
                                </div><!--end custom-form-->
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="col-lg-7 col-md-6 order-1 order-md-2">
                        <div class="card border-0">
                            <div class="card-body p-0">
                                <img src="images/contact.svg" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container-fluid mt-100 mt-60">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="card map border-0">
                            <div class="card-body p-0">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25070.345619970132!2d48.279410103948734!3d38.23790574422509!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40189774b1c00845%3A0x542d7e401888dd16!2sSheikh%20Safi%20Al-Din%20Ardabili&#39;s%20khanqah!5e0!3m2!1sen!2sro!4v1662255980535!5m2!1sen!2sro" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End contact -->

@endsection
