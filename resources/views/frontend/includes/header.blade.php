   <!doctype html>
<html lang="en">
<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>Edubin - LMS Education HTML Template</title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('frontend') }}/images/favicon.png" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/animate.css">
    
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/nice-select.css">
    
    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/jquery.nice-number.min.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/magnific-popup.css">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/font-awesome.min.css">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/default.css">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/responsive.css">
  
  
</head>

<body>
   
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
                        <div class="logo" style="max-width: 180px;">
                            <a href="#">
                  <img src="{{ asset('settings/' . ($settings['logo'] ?? 'frontend/images/logo2.avif')) }}" alt="Logo" style="max-width: 80px;">
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
                                <a href="login" class="main-btn">Login</a>
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
                                    </li>
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