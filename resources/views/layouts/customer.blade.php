<!DOCTYPE html>
    <html lang="en">


<head>
        <meta charset="utf-8" />
        <title> {{ $data['profile'][0]['name'] }} </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
        <meta name="keywords" content="Saas, Software, multi-uses, HTML, Clean, Modern" />
        <meta name="author" content="Seyed amirreza Ardebili" />
        <meta name="email" content="s.amirreza1376ardebili@gmail.com" />
        <meta name="website" content="https://www.linkedin.com/in/seyedamirrezaardebili" />
        <meta name="Version" content="v3.2.1" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <link href="/docs/5.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet" integrity="sha384-+4j30LffJ4tgIMrq9CwHvn0NjEvmuDCOfk6Rpg2xg7zgOxWWtLtozDEEVvBPgHqE" crossorigin="anonymous">
        <!-- favicon -->
        <!-- <link rel="shortcut icon" href="images/favicon.ico">  -->
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- tobii css -->
        <link href="css/tobii.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons -->
        <link href="css/materialdesignicons.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="unicons.iconscout.com/release/v3.0.6/css/line.css">
        <!-- Slider -->
        <link rel="stylesheet" href="css/tiny-slider.css"/>
        <!-- Main Css -->
        <link href="css/style.min.css" rel="stylesheet" type="text/css" id="theme-opt" />
        <link href="css/colors/green.css" rel="stylesheet" id="color-opt">

    </head>

    <body dir='rtl'>

        <!-- Navbar STart -->
        <header id="topnav" class="defaultscroll sticky">
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a class="logo" href="{{ route('index') }}">
                        <img src="{{ Storage::url( $data['profile'][0]['file'] ) }}" class="l-light d-inline-block" height="24" alt="">
                        <span class='text-light  d-inline-block'>{{$data['profile'][0]['name'] }}</span>
                    </a>
                </div>

                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu nav-light">
                        <li><a href="{{ route('index') }}" class="sub-menu-item">صفحه اصلی </a></li>
                        <li class="has-submenu parent-parent-menu-item">
                            <a href="{{ route('indexgroup') }}"> خدمات </a></span>
                        </li>

                        <li class="has-submenu parent-parent-menu-item">
                            <a href="{{ route('indexproduct') }}">محصولات </a></span>
                        </li>
                            <li class="has-submenu parent-parent-menu-item">
                            <a href="{{ route('article') }}">مقالات  </a></span>
                        </li>
                        <li class="has-submenu parent-menu-item">
                            <a href="javascript:void(0)">درباره ما </a> 
                                <li><a href="{{ route('aboutus') }}" class="sub-menu-item">تماس با ما </a></li>
                        </li>
                    </ul><!--end navigation menu-->
                </div><!--end navigation-->
            </div><!--end container-->
        </header><!--end header-->
        <!-- Navbar End -->
            <!-- Hero Start -->
            @foreach($data['file'] as $key=>$file)
        @if($file['key']=='header')
      <section class="bg-half-170 d-table w-100" style='background: url({{ Storage::url($file["url"]) }}) center center;' id="home">
            <div class="bg-overlay"></div>
            <div class="container">

            </div><!--end container-->
        </section><!--end section-->

        @endif
      @endforeach

        @yield('content')
        <!-- Footer Start -->
        <footer class="footer bg-dark text-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                        <a href="{{ route('index') }}" class="logo-footer">
                            <img src="{{ Storage::url( $data['profile'][0]['file'] ) }}" height="24" alt="">
                        </a>
                        <p class="mt-4 text-muted">شرکت تلاونگ با ده ها سال تجربه در زمینه مرغداری و گلخانه ، یک سرمایه گذاری مطمین را به شما پیشنهاد میکند</p>
                        <ul class="list-unstyled social-icon social mb-0 mt-4">
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="facebook" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="instagram" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="twitter" class="fea icon-sm fea-social"></i></a></li>
                            <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i data-feather="linkedin" class="fea icon-sm fea-social"></i></a></li>
                        </ul><!--end icon-->
                    </div><!--end col-->

                    <div class="col-lg-2 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <h5 class="text-dark footer-head">شرکت </h5>
                        <ul class="list-unstyled footer-list mt-4">
                            <li><a href="page-aboutus.html" class="text-muted"><i class="uil uil-angle-left-b me-1"></i> درباره ما </a></li>
                            <li><a href="{{ route('indexgroup') }}" class="text-muted"><i class="uil uil-angle-left-b me-1"></i> خدمات </a></li>
                            <li><a href="[{ route('project') }}" class="text-muted"><i class="uil uil-angle-left-b me-1"></i> پروژه </a></li>
                            <li><a href="{{ route('indexgroup') }}" class="text-muted"><i class="uil uil-angle-left-b me-1"></i> محصولات </a></li>
                        </ul>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <h5 class="text-dark footer-head">لینک های مفید </h5>
                        <ul class="list-unstyled footer-list mt-4">
                            <li><a href="https://www.president.ir/fa/nahad" class="text-muted"><i class="uil uil-angle-left-b me-1"></i>   ریاست جمهوری </a></li>
                            <li><a href="https://www.maj.ir/" class="text-muted"><i class="uil uil-angle-left-b me-1"></i>  وزرات کشاورزی </a></li>
                            <li><a href="https://cyberpolice.ir/" class="text-muted"><i class="uil uil-angle-left-b me-1"></i> پلیس فتا </a></li>
                            <li><a href="https://www.mimt.gov.ir/" class="text-muted"><i class="uil uil-angle-left-b me-1"></i> وزارت صمت </a></li>
                            <li><a href="https://www.leader.ir/fa/letter" class="text-muted"><i class="uil uil-angle-left-b me-1"></i> دفتر رهبری </a></li>
                        </ul>
                    </div><!--end col-->

                    <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                        <h5 class="text-dark footer-head">خبرنامه </h5>
                        <p class="mt-4 text-muted">ثبت نام کنید و آخرین نکات را از طریق ایمیل دریافت کنید.</p>
                        <form action='{{ route("index") }}' method="get">
                                @csrf
                                @method('get')
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="foot-subscribe foot-white mb-3">
                                        <label class="form-label text-muted">ایمیل خود را بنویسید <span class="text-danger">*</span></label>
                                        <div class="form-icon position-relative">
                                            <i data-feather="mail" class="fea icon-sm icons"></i>
                                            <input type="email" name="email" id="emailsubscribe" class="form-control bg-light border ps-5 rounded" placeholder="ایمیل شما: " required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-grid">
                                        <input type="submit" id="submitsubscribe" name="send" class="btn btn-primary" value="خبرنامه">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->

            <div class="container text-center ">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="text-sm-start">
                            <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> تیم <a href='https://instagram.com/hexcodeteam?igshid=YmMyMTA2M2Y='>hex code</a>. طراحی شده   <i class="mdi mdi-heart text-danger"></i> توسط  <a href="https://www.linkedin.com/in/seyedamirrezaardebili" target="_blank" class="text-reset">سید امیررضا اردبیلی </a>.</p>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </footer><!--end footer-->
        <!-- Footer End -->

        <!-- Back to top -->
       
        <!-- end Style switcher -->

        <script src="/docs/5.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <!-- javascript -->
        <script src="js/bootstrap.bundle.min.js"></script>
        <!-- SLIDER -->
        <script src="js/tiny-slider.js"></script>
        <!-- tobii js -->
        <script src="js/tobii.min.js"></script>
        <!-- Icons -->
        <script src="js/feather.min.js"></script>
        <!-- Switcher -->
        <script src="js/switcher.js"></script>
        <!-- Main Js -->
        <script src="js/plugins.init.js"></script><!--Note: All init js like tiny slider, counter, countdown, maintenance, lightbox, gallery, swiper slider, aos animation etc.-->
        <script src="js/app.js"></script><!--Note: All important javascript like page loader, menu, sticky menu, menu-toggler, one page menu etc. -->
    </body>

</html>
