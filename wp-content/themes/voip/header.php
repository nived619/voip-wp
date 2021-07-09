<!DOCTYPE html>
<html lang="en">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Page Title -->
    <title><?php wp_title();?></title>
    
    <!-- Meta-Data -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="We Are Team. Working Successfully Last 15 Years">
    <meta name="keywords" content="Professionality, Reliability, Best Quality, Reliability">
    
    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.png">
    
    <!-- Web Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <?php wp_head(); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/font-awesome.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/plugins/owlcarousel/owl.carousel.min.css">
    <!-- Color Switcher CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/plugins/color-switcher/color-switcher.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/plugins/magnific-popup/magnific-popup.min.css">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/style1.2.css">
    <!-- Your Custom StyleSheet -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/custom1.2.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/about-1.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/blog.css">
    
    <!-- Color CSS -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/colors/theme-color-10.css">
  </head>

  <body>

    <!-- Start Preloader -->
     <div class="preloader">
      <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
      </div>
    </div>
    <!-- End Preloader -->

    <!-- Start Header Area -->
    <header class="header">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-2 col-md-3 col-4">
            <!-- Start Logo -->
            <div class="logo" data-animate="fadeInUp" data-delay=".2">
              <a href="https://www.voipessential.com/index.html">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/logos/voip-essential-logo-01.png" data-rjs="2" alt="Site logo">
              </a>
            </div>
            <!-- End Logo -->
          </div>
          <div class="col-lg-10 col-md-6 col-8">
            <nav class="text-right">
              <!-- Start Header Menu -->
              <div class="main-menu" data-animate="fadeInUp" data-delay=".2">
                <ul>
                  <li><a href="https://www.voipessential.com/index.html">Home</a></li>
                  <li><a href="#">Services <i class="fa fa-caret-down"></i></a>
                    <ul class="sub-menu">
                      <li><a href="https://www.voipessential.com/voice-service.html">Voice</a></li>
                      <li><a href="https://www.voipessential.com/messaging-service.html">Messaging</a></li>
                      <li><a href="https://www.voipessential.com/phone-numbers-service.html">DID Numbers</a></li>
                      <li><a href="https://www.voipessential.com/contact-centers.html">Contact Centers</a></li>
                      <li><a href="https://www.voipessential.com/hosted-phone-systems.html">Hosted Phone Systems</a></li>
                    </ul>
                  </li>
                  <li><a href="https://www.voipessential.com/pricing.html">Pricing</a></li>
                  <li class="active"><a href="about.html">About Us</a></li>
                  <li><a href="https://www.voipessential.com/contact.html">Contact</a></li>
                  <li>
                                        <a data-animate="fadeInUp" data-delay=".2" href="https://www.voipessential.com//register" class="header-btn btn customer-login">
                                            <span>Sign Up</span>
                                        </a>
                                    </li>                     
                  <li>
                    <a data-animate="fadeInUp" data-delay=".2" href="https://dashboard.voipessential.com/" class="header-btn btn customer-login"><i class="fa fa-user" aria-hidden="true"></i><span>Login</span></a>
                    <ul class="sub-menu">
                      <li><a href="https://dashboard.voipessential.com">Dashboard</a></li>
                      <!--<li><a href="https://secure.voipessential.com/user">Legacy Dashboard</a></li>-->
                      <li><a href="https://portal.voipessential.com">Wholesale Portal</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <!-- End Header Menu -->
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- End Header Area -->