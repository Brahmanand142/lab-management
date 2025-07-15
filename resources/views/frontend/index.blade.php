@extends('frontend.layouts.master')
@section('title','Index')
@section('content')

    <!--====== PRELOADER PART START ======-->
    
    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>
    
    <!--====== PRELOADER PART START ======-->
    
    <!--====== HEADER PART START ======-->
    
    <header id="header-part">
       
        <div class="header-top d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header-contact text-lg-left text-center">
                            <ul>
                                <li><img src="{{ asset('frontend') }}/images/all-icon/map.png" alt="icon"><span>{{ $settings['address'] ?? '127/5 Mark street, New york' }}</span></li>
                                <li><img src="{{ asset('frontend') }}/images/all-icon/email.png" alt="icon"><span>{{ $settings['email'] ?? 'info@yourmail.com' }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header-opening-time text-lg-right text-center">
                            <p>Opening Hours : {{ $settings['opening_hours'] ?? 'Monday to Saturday - 8 AM to 5 PM' }}</p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header top -->
        
        <div class="header-logo-support pt-30 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="logo">
                            <a href="index-2.html">
                                <img src="{{ asset($settings['logo'] ?? 'frontend/images/logo2.avif') }}" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="support-button float-right d-none d-md-block">
                            <div class="support float-left">
                                <div class="icon">
                                    <img src="{{ asset('frontend') }}/images/all-icon/support.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <p>Need Help? call us free</p>
                                    <span>321 325 5678</span>
                                </div>
                            </div>
                            <div class="button float-left">
                                <a href="#" class="main-btn">Apply Now</a>
                            </div>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- header logo support -->
        
        <div class="navigation">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="active" href="index-2.html">Home</a>
                                        <ul class="sub-menu">
                                            <li><a class="active" href="index-2.html">Home 01</a></li>
                                            <li><a href="index-3.html">Home 02</a></li>
                                            <li><a href="index-4.html">Home 03</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="about.html">About us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="courses.html">Courses</a>
                                        <ul class="sub-menu">
                                            <li><a href="courses.html">Courses</a></li>
                                            <li><a href="courses-singel.html">Course Singel</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="events.html">Events</a>
                                        <ul class="sub-menu">
                                            <li><a href="events.html">Events</a></li>
                                            <li><a href="events-singel.html">Event Singel</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="teachers.html">Our teachers</a>
                                        <ul class="sub-menu">
                                            <li><a href="teachers.html">teachers</a></li>
                                            <li><a href="teachers-singel.html">teacher Singel</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="blog.html">Blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="blog.html">Blog</a></li>
                                            <li><a href="blog-singel.html">Blog Singel</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="shop.html">Shop</a>
                                        <ul class="sub-menu">
                                            <li><a href="shop.html">Shop</a></li>
                                            <li><a href="shop-singel.html">Shop Singel</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="contact.html">Contact</a>
                                        <ul class="sub-menu">
                                            <li><a href="contact.html">Contact Us</a></li>
                                            <li><a href="contact-2.html">Contact Us 2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                        <div class="right-icon text-right">
                            <ul>
                                <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-bag"></i><span>0</span></a></li>
                            </ul>
                        </div> <!-- right icon -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
        
    </header>
    
    <!--====== HEADER PART ENDS ======-->
   
    <!--====== SEARCH BOX PART START ======-->
    
    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>
    <!--====== SEARCH BOX PART ENDS ======-->
    <!--====== SLIDER PART START ======-->
    
    <section id="slider-part" class="slider-active">
        <div class="single-slider bg_cover pt-150" style="background-image: url({{ asset('images/slider/s-1.jpg') }})" data-overlay="4" style="background-image: url(images/slider/s-1.jpg)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Choose the right theme for education</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">Donec vitae sapien ut libearo venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt  Sed fringilla mauri amet nibh.</p>
                            <ul>
                                <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">Read More</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="#">Get Started</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
        
        <div class="single-slider bg_cover pt-150" style="background-image: url({{ asset('images/slider/s-2.jpg') }})" data-overlay="4" style="background-image: url(images/slider/s-2.jpg)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Choose the right theme for education</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">Donec vitae sapien ut libearo venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt  Sed fringilla mauri amet nibh.</p>
                            <ul>
                                <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">Read More</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="#">Get Started</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
        
        <div class="single-slider bg_cover pt-150" style="background-image: url({{ asset('images/slider/s-3.jpg') }})" data-overlay="4" style="background-image: url(images/slider/s-3.jpg)" data-overlay="4">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-lg-9">
                        <div class="slider-cont">
                            <h1 data-animation="bounceInLeft" data-delay="1s">Choose the right theme for education</h1>
                            <p data-animation="fadeInUp" data-delay="1.3s">Donec vitae sapien ut libearo venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt  Sed fringilla mauri amet nibh.</p>
                            <ul>
                                <li><a data-animation="fadeInUp" data-delay="1.6s" class="main-btn" href="#">Read More</a></li>
                                <li><a data-animation="fadeInUp" data-delay="1.9s" class="main-btn main-btn-2" href="#">Get Started</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- single slider -->
    </section>
    
    <!--====== SLIDER PART ENDS ======-->
   
    <!--====== ABOUT PART START ======-->
    
    <section id="about-part" class="pt-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h5>About us</h5>
                        <h2>Welcome to Edubin </h2>
                    </div> <!-- section title -->
                    <div class="about-cont">
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                        <a href="#" class="main-btn mt-55">Learn More</a>
                    </div>
                </div> <!-- about cont -->
                <div class="col-lg-6 offset-lg-1">
                    <div class="about-event mt-50">
                    
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="about-bg">
            <img src="{{ asset('frontend') }}/images/about/bg-1.png" alt="About">
        </div>
    </section>
    
    <!--====== ABOUT PART ENDS ======-->
   
   
   
    <!--====== TEACHERS PART START ======-->
    
    <section id="teachers-part" class="pt-70 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h5>Featured Teachers</h5>
                        <h2>Meet Our teachers</h2>
                    </div> <!-- section title -->
                    <div class="teachers-cont">
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris. <br> <br> auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet . Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt  mauris</p>
                        <a href="#" class="main-btn mt-55">Career with us</a>
                    </div> <!-- teachers cont -->
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="teachers mt-20">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{ asset('frontend') }}/images/teachers/t-1.jpg" alt="Teachers">
                                    </div>
                                    <div class="cont">
                                        <a href="teachers-singel.html"><h6>Mark alen</h6></a>
                                        <span>Vice chencelor</span>
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{ asset('frontend') }}/images/teachers/t-2.jpg" alt="Teachers">
                                    </div>
                                    <div class="cont">
                                        <a href="teachers-singel.html"><h6>David card</h6></a>
                                        <span>Pro chencelor</span>
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{ asset('frontend') }}/images/teachers/t-3.jpg" alt="Teachers">
                                    </div>
                                    <div class="cont">
                                        <a href="teachers-singel.html"><h6>Rebeka alig</h6></a>
                                        <span>Pro chencelor</span>
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                            <div class="col-sm-6">
                                <div class="singel-teachers mt-30 text-center">
                                    <div class="image">
                                        <img src="{{ asset('frontend') }}/images/teachers/t-4.jpg" alt="Teachers">
                                    </div>
                                    <div class="cont">
                                        <a href="teachers-singel.html"><h6>Hanna bein</h6></a>
                                        <span>Aerobics head</span>
                                    </div>
                                </div> <!-- singel teachers -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- teachers -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== TEACHERS PART ENDS ======-->
   
    <!--====== PUBLICATION PART START ======-->
 
    <!--====== PUBLICATION PART ENDS ======-->
   
     
     
   
    
    
 
    
 @endsection