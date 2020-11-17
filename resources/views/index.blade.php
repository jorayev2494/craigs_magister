<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="advanced search custom, agency, agent, business, clean, corporate, directory, google maps, homes, listing, membership packages, property, real estate, real estate agent, realestate agency, realtor">
    <meta name="description" content="FindHouse - Real Estate HTML Template">
    <meta name="CreativeLayers" content="ATFN">

    <!-- css file -->
    <link rel="stylesheet" href="{{ asset('client') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('client') }}/css/style.css">

    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{ asset('client') }}/css/responsive.css">

    <!-- Title -->
    <title>FindHouse</title>

    <!-- Favicon -->
    <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesnt work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

    <body class="maxw1600 m0a">
        <div class="wrapper" id="app">
            <div class="preloader"></div>

            <!-- Main Header Nav -->
            <header class="header-nav menu_style_home_one style2 home3 navbar-scrolltofixed stricky main-menu">
                <div class="container-fluid p0">
                    <!-- Ace Responsive Menu -->
                    <nav>
                        <!-- Menu Toggle btn-->
                        <div class="menu-toggle">
                            <img class="nav_logo_img img-fluid" src="{{ asset('client') }}/images/header-logo.png" alt="header-logo.png">
                            <button type="button" id="menu-btn">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <a href="#" class="navbar_brand float-left dn-smd">
                            <img class="logo1 img-fluid" src="{{ asset('client') }}/images/header-logo2.png" alt="header-logo.png">
                            <img class="logo2 img-fluid" src="{{ asset('client') }}/images/header-logo2.png" alt="header-logo2.png">
                            <span>FindHouse</span>
                        </a>
                        <!-- Responsive Menu Structure-->
                        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
                        <ul id="respMenu" class="ace-responsive-menu text-right" data-menu-style="horizontal">
                            <li>
                                <a href="#"><span class="title">Home</span></a>
                                <!-- Level Two-->
                                <ul>
                                    <li><a href="index.html">Home 1</a></li>
                                    <li><a href="index2.html">Home 2</a></li>
                                    <li><a href="index3.html">Home 3</a></li>
                                    <li><a href="index4.html">Home 4</a></li>
                                    <li><a href="index5.html">Home 5</a></li>
                                    <li><a href="index6.html">Home 6</a></li>
                                    <li><a href="index7.html">Home 7</a></li>
                                    <li><a href="index8.html">Home 8</a></li>
                                    <li><a href="index9.html">Home 9</a></li>
                                    <li><a href="index10.html">Home 10</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="title">Listing</span></a>
                                <!-- Level Two-->
                                <ul>
                                    <li>
                                        <a href="#">Listing Grid</a>
                                        <!-- Level Three-->
                                        <ul>
                                            <li><a href="page-listing-grid-v1.html">Grid v1</a></li>
                                            <li><a href="page-listing-grid-v2.html">Grid v2</a></li>
                                            <li><a href="page-listing-grid-v3.html">Grid v3</a></li>
                                            <li><a href="page-listing-grid-v4.html">Grid v4</a></li>
                                            <li><a href="page-listing-grid-v5.html">Grid v5</a></li>
                                            <li><a href="page-listing-full-width-grid.html">Grid Fullwidth</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Listing List</a>
                                        <!-- Level Three-->
                                        <ul>
                                            <li><a href="page-listing-list.html">List V1</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Listing Style</a>
                                        <!-- Level Three-->
                                        <ul>
                                            <li><a href="page-listing-parallax.html">Parallax Style</a></li>
                                            <li><a href="page-listing-slider.html">Slider Style</a></li>
                                            <li><a href="page-listing-map.html">Map Header</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Listing Half</a>
                                        <!-- Level Three-->
                                        <ul>
                                            <li><a href="page-listing-half-map-v1.html">Map V1</a></li>
                                            <li><a href="page-listing-half-map-v2.html">Map V2</a></li>
                                            <li><a href="page-listing-half-map-v3.html">Map V3</a></li>
                                            <li><a href="page-listing-half-map-v4.html">Map V4</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Agent View</a>
                                        <!-- Level Three-->
                                        <ul>
                                            <li><a href="page-listing-agent-v1.html">Agent V1</a></li>
                                            <li><a href="page-listing-agent-v2.html">Agent V2</a></li>
                                            <li><a href="page-listing-agent-v3.html">Agent Details</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Agencies View</a>
                                        <!-- Level Three-->
                                        <ul>
                                            <li><a href="page-listing-agencies-v1.html">Agencies V1</a></li>
                                            <li><a href="page-listing-agencies-v2.html">Agencies V2</a></li>
                                            <li><a href="page-listing-agencies-v3.html">Agencies Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="page-add-new-property.html">Create Listing</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="title">Property</span></a>
                                <ul>
                                    <li>
                                        <a href="#">User Admin</a>
                                        <ul>
                                            <li><a href="page-dashboard.html">Dashboard</a></li>
                                            <li><a href="page-my-properties.html">My Properties</a></li>
                                            <li><a href="page-message.html">My Message</a></li>
                                            <li><a href="page-my-review.html">My Review</a></li>
                                            <li><a href="page-my-favorites.html">My Favorites</a></li>
                                            <li><a href="page-add-new-property.html">Add Property</a></li>
                                            <li><a href="page-my-profile.html">My Profile</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Listing Single</a>
                                        <!-- Level Three-->
                                        <ul>
                                            <li><a href="page-listing-single-v1.html">Single V1</a></li>
                                            <li><a href="page-listing-single-v2.html">Single V2</a></li>
                                            <li><a href="page-listing-single-v3.html">Single V3</a></li>
                                            <li><a href="page-listing-single-v4.html">Single V4</a></li>
                                            <li><a href="page-listing-single-v5.html">Single V5</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="page-add-new-property.html">Create Listing</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="title">Pages</span></a>
                                <ul>
                                    <li>
                                        <a href="#"><span class="title">Pages</span></a>
                                        <ul>
                                            <li><a href="page-shop.html">Shop</a></li>
                                            <li><a href="page-shop-single.html">Shop Single</a></li>
                                            <li><a href="page-shop-cart.html">Cart</a></li>
                                            <li><a href="page-shop-checkout.html">Checkout</a></li>
                                            <li><a href="page-shop-order.html">Order</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="page-about.html">About Us</a></li>
                                    <li><a href="page-gallery.html">Gallery</a></li>
                                    <li><a href="page-faq.html">Faq</a></li>
                                    <li><a href="page-login.html">LogIn</a></li>
                                    <li><a href="page-compare.html">Membership</a></li>
                                    <li><a href="page-compare2.html">Membership 2</a></li>
                                    <li><a href="page-register.html">Register</a></li>
                                    <li><a href="page-service.html">Service</a></li>
                                    <li><a href="page-error.html">404 Page</a></li>
                                    <li><a href="page-terms.html">Terms and Conditions</a></li>
                                    <li><a href="page-ui-element.html">UI Elements</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><span class="title">Blog</span></a>
                                <ul>
                                    <li><a href="page-blog-v1.html">Blog List 1</a></li>
                                    <li><a href="page-blog-grid.html">Blog List 2</a></li>
                                    <li><a href="page-blog-single.html">Single Post</a></li>
                                </ul>
                            </li>
                            <li class="last">
                                <a href="page-contact.html"><span class="title">Contact</span></a>
                            </li>
                            <li class="list-inline-item list_s"><a href="#" class="btn flaticon-user" data-toggle="modal"
                                    data-target=".bd-example-modal-lg"> <span
                                        class="dn-lg text-thm3">Login/Register</span></a></li>
                            <li class="list-inline-item add_listing home2"><a href="#"><span
                                        class="flaticon-plus"></span><span class="dn-lg"> Create Listing</span></a></li>
                        </ul>
                    </nav>
                </div>
            </header>
            <!-- Modal -->

            <div class="sign_up_modal modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body container pb20">
                            <div class="row">
                                <div class="col-lg-12">
                                    <ul class="sign_up_tab nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                role="tab" aria-controls="home" aria-selected="true">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                role="tab" aria-controls="profile" aria-selected="false">Register</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-content container" id="myTabContent">
                                <div class="row mt25 tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="login_thumb">
                                            <img class="img-fluid w100" src="{{ asset('client') }}/images/resource/login.jpg" alt="login.jpg">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="login_form">
                                            <form action="#">
                                                <div class="heading">
                                                    <h4>Login</h4>
                                                </div>
                                                <div class="row mt25">
                                                    <div class="col-lg-12">
                                                        <button type="submit" class="btn btn-fb btn-block"><i
                                                                class="fa fa-facebook float-left mt5"></i> Login with
                                                            Facebook</button>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <button type="submit" class="btn btn-googl btn-block"><i
                                                                class="fa fa-google float-left mt5"></i> Login with
                                                            Google</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="input-group mb-2 mr-sm-2">
                                                    <input type="text" class="form-control"
                                                        id="inlineFormInputGroupUsername2" placeholder="User Name Or Email">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="flaticon-user"></i></div>
                                                    </div>
                                                </div>
                                                <div class="input-group form-group">
                                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                                        placeholder="Password">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="flaticon-password"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                                    <label class="custom-control-label" for="exampleCheck1">Remember
                                                        me</label>
                                                    <a class="btn-fpswd float-right" href="#">Lost your password?</a>
                                                </div>
                                                <button type="submit" class="btn btn-log btn-block btn-thm">Log In</button>
                                                <p class="text-center">Don't have an account? <a class="text-thm"
                                                        href="#">Register</a></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt25 tab-pane fade" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="regstr_thumb">
                                            <img class="img-fluid w100" src="{{ asset('client') }}/images/resource/regstr.jpg" alt="regstr.jpg">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="sign_up_form">
                                            <div class="heading">
                                                <h4>Register</h4>
                                            </div>
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <button type="submit" class="btn btn-block btn-fb"><i
                                                                class="fa fa-facebook float-left mt5"></i> Login with
                                                            Facebook</button>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <button type="submit" class="btn btn-block btn-googl"><i
                                                                class="fa fa-google float-left mt5"></i> Login with
                                                            Google</button>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="form-group input-group">
                                                    <input type="text" class="form-control" id="exampleInputName"
                                                        placeholder="User Name">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="flaticon-user"></i></div>
                                                    </div>
                                                </div>
                                                <div class="form-group input-group">
                                                    <input type="email" class="form-control" id="exampleInputEmail2"
                                                        placeholder="Email">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="fa fa-envelope-o"></i></div>
                                                    </div>
                                                </div>
                                                <div class="form-group input-group">
                                                    <input type="password" class="form-control" id="exampleInputPassword2"
                                                        placeholder="Password">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="flaticon-password"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group input-group">
                                                    <input type="password" class="form-control" id="exampleInputPassword3"
                                                        placeholder="Re-enter password">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text"><i class="flaticon-password"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group ui_kit_select_search mb0">
                                                    <select class="selectpicker" data-live-search="true" data-width="100%">
                                                        <option data-tokens="SelectRole">Single User</option>
                                                        <option data-tokens="Agent/Agency">Agent</option>
                                                        <option data-tokens="SingleUser">Multi User</option>
                                                    </select>
                                                </div>
                                                <div class="form-group custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="exampleCheck2">
                                                    <label class="custom-control-label" for="exampleCheck2">I have read and
                                                        accept the Terms and Privacy Policy?</label>
                                                </div>
                                                <button type="submit" class="btn btn-log btn-block btn-thm">Sign Up</button>
                                                <p class="text-center">Already have an account? <a class="text-thm"
                                                        href="#">Log In</a></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Header Nav For Mobile -->
            <div id="page" class="stylehome1 h0">
                <div class="mobile-menu">
                    <div class="header stylehome1">
                        <div class="main_logo_home2 text-center">
                            <img class="nav_logo_img img-fluid mt20" src="{{ asset('client') }}/images/header-logo2.png" alt="header-logo2.png">
                            <span class="mt20">FindHouse</span>
                        </div>
                        <ul class="menu_bar_home2">
                            <li class="list-inline-item list_s"><a href="page-register.html"><span
                                        class="flaticon-user"></span></a></li>
                            <li class="list-inline-item"><a href="#menu"><span></span></a></li>
                        </ul>
                    </div>
                </div><!-- /.mobile-menu -->
                <nav id="menu" class="stylehome1">
                    <ul>
                        <li><span>Home</span>
                            <ul>
                                <li><a href="index.html">Home 1</a></li>
                                <li><a href="index2.html">Home 2</a></li>
                                <li><a href="index3.html">Home 3</a></li>
                                <li><a href="index4.html">Home 4</a></li>
                                <li><a href="index5.html">Home 5</a></li>
                                <li><a href="index6.html">Home 6</a></li>
                                <li><a href="index7.html">Home 7</a></li>
                                <li><a href="index8.html">Home 8</a></li>
                                <li><a href="index9.html">Home 9</a></li>
                                <li><a href="index10.html">Home 10</a></li>
                            </ul>
                        </li>
                        <li><span>Listing</span>
                            <ul>
                                <li><span>Listing Grid</span>
                                    <ul>
                                        <li><a href="page-listing-grid-v1.html">Grid v1</a></li>
                                        <li><a href="page-listing-grid-v2.html">Grid v2</a></li>
                                        <li><a href="page-listing-grid-v3.html">Grid v3</a></li>
                                        <li><a href="page-listing-grid-v4.html">Grid v4</a></li>
                                        <li><a href="page-listing-grid-v5.html">Grid v5</a></li>
                                        <li><a href="page-listing-full-width-grid.html">Grid Fullwidth</a></li>
                                    </ul>
                                </li>
                                <li><span>Listing Style</span>
                                    <ul>
                                        <li><a href="page-listing-parallax.html">Parallax Style</a></li>
                                        <li><a href="page-listing-slider.html">Slider Style</a></li>
                                        <li><a href="page-listing-map.html">Map Header</a></li>
                                    </ul>
                                </li>
                                <li><span>Listing Half</span>
                                    <ul>
                                        <li><a href="page-listing-half-map-v1.html">Map V1</a></li>
                                        <li><a href="page-listing-half-map-v2.html">Map V2</a></li>
                                        <li><a href="page-listing-half-map-v3.html">Map V3</a></li>
                                        <li><a href="page-listing-half-map-v4.html">Map V4</a></li>
                                    </ul>
                                </li>
                                <li><span>Agent View</span>
                                    <ul>
                                        <li><a href="page-listing-agent-v1.html">Agent V1</a></li>
                                        <li><a href="page-listing-agent-v2.html">Agent V2</a></li>
                                        <li><a href="page-listing-agent-v3.html">Agent Details</a></li>
                                    </ul>
                                </li>
                                <li><span>Agencies View</span>
                                    <ul>
                                        <li><a href="page-agencies-list-v1.html">Agencies V1</a></li>
                                        <li><a href="page-agencies-list-v2.html">Agencies V2</a></li>
                                        <li><a href="page-agencies-list-v3.html">Agencies Details</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><span>Property</span>
                            <ul>
                                <li><span>Property</span>
                                    <ul>
                                        <li><a href="page-dashboard.html">Dashboard</a></li>
                                        <li><a href="page-my-properties.html">My Properties</a></li>
                                        <li><a href="page-add-new-property.html">Add New Property</a></li>
                                    </ul>
                                </li>
                                <li><span>Listing Single</span>
                                    <ul>
                                        <li><a href="page-listing-single-v1.html">Single V1</a></li>
                                        <li><a href="page-listing-single-v2.html">Single V2</a></li>
                                        <li><a href="page-listing-single-v3.html">Single V3</a></li>
                                        <li><a href="page-listing-single-v4.html">Single V4</a></li>
                                        <li><a href="page-listing-single-v5.html">Single V5</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><span>Blog</span>
                            <ul>
                                <li><a href="page-blog-v1.html">Blog List 1</a></li>
                                <li><a href="page-blog-grid.html">Blog List 2</a></li>
                                <li><a href="page-blog-single.html">Single Post</a></li>
                            </ul>
                        </li>
                        <li><span>Pages</span>
                            <ul>
                                <li><span>Shop</span>
                                    <ul>
                                        <li><a href="page-shop.html">Shop</a></li>
                                        <li><a href="page-shop-single.html">Shop Single</a></li>
                                        <li><a href="page-shop-cart.html">Cart</a></li>
                                        <li><a href="page-shop-checkout.html">Checkout</a></li>
                                        <li><a href="page-shop-order.html">Order</a></li>
                                    </ul>
                                </li>
                                <li><a href="page-about.html">About Us</a></li>
                                <li><a href="page-gallery.html">Gallery</a></li>
                                <li><a href="page-faq.html">Faq</a></li>
                                <li><a href="page-login.html">LogIn</a></li>
                                <li><a href="page-compare.html">Membership</a></li>
                                <li><a href="page-compare2.html">Membership 2</a></li>
                                <li><a href="page-register.html">Register</a></li>
                                <li><a href="page-service.html">Service</a></li>
                                <li><a href="page-error.html">404 Page</a></li>
                                <li><a href="page-terms.html">Terms and Conditions</a></li>
                                <li><a href="page-ui-element.html">UI Elements</a></li>
                            </ul>
                        </li>
                        <li><a href="page-contact.html">Contact</a></li>
                        <li><a href="page-login.html"><span class="flaticon-user"></span> Login</a></li>
                        <li><a href="page-register.html"><span class="flaticon-edit"></span> Register</a></li>
                        <li class="cl_btn"><a class="btn btn-block btn-lg btn-thm circle" href="#"><span
                                    class="flaticon-plus"></span> Create Listing</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Home Design -->
            <section class="home-three bg-img3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="home3_home_content">
                                <h1>Your Property, Our Priority.</h1>
                                <h4>From as low as $10 per day with limited time offer discounts</h4>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="home3_home_content">
                                <a class="popup_video_btn popup-iframe popup-youtube"
                                    href="https://www.youtube.com/watch?v=R7xbhKIiw4Y"><i class="flaticon-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="home_adv_srch_opt home3">
                                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                            role="tab" aria-controls="pills-home" aria-selected="true">Buy</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile"
                                            role="tab" aria-controls="pills-profile" aria-selected="false">Rent</a>
                                    </li>
                                </ul>
                                <div class="tab-content home1_adsrchfrm" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                        aria-labelledby="pills-home-tab">
                                        <div class="home1-advnc-search home3">
                                            <ul class="h1ads_1st_list mb0">
                                                <li class="list-inline-item">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="exampleInputName1"
                                                            placeholder="Enter keyword...">
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="search_option_two">
                                                        <div class="candidate_revew_select">
                                                            <select class="selectpicker w100 show-tick">
                                                                <option>Property Type</option>
                                                                <option>Apartment</option>
                                                                <option>Bungalow</option>
                                                                <option>Condo</option>
                                                                <option>House</option>
                                                                <option>Land</option>
                                                                <option>Single Family</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="exampleInputEmail"
                                                            placeholder="Location">
                                                        <label for="exampleInputEmail"><span
                                                                class="flaticon-maps-and-flags"></span></label>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="small_dropdown2 home3">
                                                        <div id="prncgs" class="btn dd_btn">
                                                            <span>Price</span>
                                                            <label for="exampleInputEmail2"><span
                                                                    class="fa fa-angle-down"></span></label>
                                                        </div>
                                                        <div class="dd_content2">
                                                            <div class="pricing_acontent">
                                                                <input type="text" class="amount" placeholder="$52,239">
                                                                <input type="text" class="amount2" placeholder="$985,14">
                                                                <div class="slider-range"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="custome_fields_520 list-inline-item">
                                                    <div class="navbered">
                                                        <div class="mega-dropdown home3">
                                                            <span id="show_advbtn" class="dropbtn">Advanced <i
                                                                    class="flaticon-more pl10 flr-520"></i></span>
                                                            <div class="dropdown-content">
                                                                <div class="row p15">
                                                                    <div class="col-lg-12">
                                                                        <h4 class="text-thm3">Amenities</h4>
                                                                    </div>
                                                                    <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                        <ul class="ui_kit_checkbox selectable-list">
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck1">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck1">Air
                                                                                        Conditioning</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck2">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck2">Lawn</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck3">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck3">Swimming
                                                                                        Pool</label>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                        <ul class="ui_kit_checkbox selectable-list">
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck4">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck4">Barbeque</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck5">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck5">Microwave</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck6">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck6">TV Cable</label>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                        <ul class="ui_kit_checkbox selectable-list">
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck7">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck7">Dryer</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck8">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck8">Outdoor
                                                                                        Shower</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck9">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck9">Washer</label>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                        <ul class="ui_kit_checkbox selectable-list">
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck10">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck10">Gym</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck11">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck11">Refrigerator</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck12">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck12">WiFi</label>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                        <ul class="ui_kit_checkbox selectable-list">
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck13">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck13">Laundry</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck14">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck14">Sauna</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck15">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck15">Window
                                                                                        Coverings</label>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="row p15 pt0-xsd">
                                                                    <div class="col-lg-11 col-xl-10">
                                                                        <ul class="apeartment_area_list mb0">
                                                                            <li class="list-inline-item">
                                                                                <div class="candidate_revew_select">
                                                                                    <select
                                                                                        class="selectpicker w100 show-tick">
                                                                                        <option>Bathrooms</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                        <option>7</option>
                                                                                        <option>8</option>
                                                                                    </select>
                                                                                </div>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <div class="candidate_revew_select">
                                                                                    <select
                                                                                        class="selectpicker w100 show-tick">
                                                                                        <option>Bedrooms</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                        <option>7</option>
                                                                                        <option>8</option>
                                                                                    </select>
                                                                                </div>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <div class="candidate_revew_select">
                                                                                    <select
                                                                                        class="selectpicker w100 show-tick">
                                                                                        <option>Year built</option>
                                                                                        <option>2013</option>
                                                                                        <option>2014</option>
                                                                                        <option>2015</option>
                                                                                        <option>2016</option>
                                                                                        <option>2017</option>
                                                                                        <option>2018</option>
                                                                                        <option>2019</option>
                                                                                        <option>2020</option>
                                                                                    </select>
                                                                                </div>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <div class="candidate_revew_select">
                                                                                    <select
                                                                                        class="selectpicker w100 show-tick">
                                                                                        <option>Built-up Area</option>
                                                                                        <option>Adana</option>
                                                                                        <option>Ankara</option>
                                                                                        <option>Antalya</option>
                                                                                        <option>Bursa</option>
                                                                                        <option>Bodrum</option>
                                                                                        <option>Gaziantep</option>
                                                                                        <option>İstanbul</option>
                                                                                        <option>İzmir</option>
                                                                                        <option>Konya</option>
                                                                                    </select>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-lg-1 col-xl-2">
                                                                        <div class="mega_dropdown_content_closer">
                                                                            <h5 class="text-thm text-right mt15"><span
                                                                                    id="hide_advbtn"
                                                                                    class="curp">Hide</span></h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="search_option_button">
                                                        <button type="submit" class="btn btn-thm3">Search</button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                        aria-labelledby="pills-profile-tab">
                                        <div class="home1-advnc-search home3">
                                            <ul class="h1ads_1st_list mb0">
                                                <li class="list-inline-item">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="exampleInputName2"
                                                            placeholder="Enter keyword...">
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="search_option_two">
                                                        <div class="candidate_revew_select">
                                                            <select class="selectpicker w100 show-tick">
                                                                <option>Property Type</option>
                                                                <option>Apartment</option>
                                                                <option>Bungalow</option>
                                                                <option>Condo</option>
                                                                <option>House</option>
                                                                <option>Land</option>
                                                                <option>Single Family</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="exampleInputEmail3"
                                                            placeholder="Location">
                                                        <label for="exampleInputEmail3"><span
                                                                class="flaticon-maps-and-flags"></span></label>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="small_dropdown2 home3">
                                                        <div id="prncgs2" class="btn dd_btn">
                                                            <span>Price</span>
                                                            <label><span class="fa fa-angle-down"></span></label>
                                                        </div>
                                                        <div class="dd_content2">
                                                            <div class="pricing_acontent">
                                                                <input type="text" class="amount" placeholder="$52,239">
                                                                <input type="text" class="amount2" placeholder="$985,14">
                                                                <div class="slider-range"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="custome_fields_520 list-inline-item">
                                                    <div class="navbered">
                                                        <div class="mega-dropdown home3">
                                                            <span id="show_advbtn2" class="dropbtn">Advanced <i
                                                                    class="flaticon-more pl10 flr-520"></i></span>
                                                            <div class="dropdown-content">
                                                                <div class="row p15">
                                                                    <div class="col-lg-12">
                                                                        <h4 class="text-thm3">Amenities</h4>
                                                                    </div>
                                                                    <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                        <ul class="ui_kit_checkbox selectable-list">
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck16">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck16">Air
                                                                                        Conditioning</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck17">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck17">Lawn</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck18">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck18">Swimming
                                                                                        Pool</label>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                        <ul class="ui_kit_checkbox selectable-list">
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck19">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck19">Barbeque</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck20">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck20">Microwave</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck21">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck21">TV Cable</label>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                        <ul class="ui_kit_checkbox selectable-list">
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck22">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck22">Dryer</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck23">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck23">Outdoor
                                                                                        Shower</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck24">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck24">Washer</label>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                        <ul class="ui_kit_checkbox selectable-list">
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck25">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck25">Gym</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck26">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck26">Refrigerator</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck27">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck27">WiFi</label>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-xxs-6 col-sm col-lg col-xl">
                                                                        <ul class="ui_kit_checkbox selectable-list">
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck28">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck28">Laundry</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck29">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck29">Sauna</label>
                                                                                </div>
                                                                            </li>
                                                                            <li>
                                                                                <div class="custom-control custom-checkbox">
                                                                                    <input type="checkbox"
                                                                                        class="custom-control-input"
                                                                                        id="customCheck30">
                                                                                    <label class="custom-control-label"
                                                                                        for="customCheck30">Window
                                                                                        Coverings</label>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <div class="row p15 pt0-xsd">
                                                                    <div class="col-lg-11 col-xl-10">
                                                                        <ul class="apeartment_area_list mb0">
                                                                            <li class="list-inline-item">
                                                                                <div class="candidate_revew_select">
                                                                                    <select
                                                                                        class="selectpicker w100 show-tick">
                                                                                        <option>Bathrooms</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                        <option>7</option>
                                                                                        <option>8</option>
                                                                                    </select>
                                                                                </div>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <div class="candidate_revew_select">
                                                                                    <select
                                                                                        class="selectpicker w100 show-tick">
                                                                                        <option>Bedrooms</option>
                                                                                        <option>1</option>
                                                                                        <option>2</option>
                                                                                        <option>3</option>
                                                                                        <option>4</option>
                                                                                        <option>5</option>
                                                                                        <option>6</option>
                                                                                        <option>7</option>
                                                                                        <option>8</option>
                                                                                    </select>
                                                                                </div>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <div class="candidate_revew_select">
                                                                                    <select
                                                                                        class="selectpicker w100 show-tick">
                                                                                        <option>Year built</option>
                                                                                        <option>2013</option>
                                                                                        <option>2014</option>
                                                                                        <option>2015</option>
                                                                                        <option>2016</option>
                                                                                        <option>2017</option>
                                                                                        <option>2018</option>
                                                                                        <option>2019</option>
                                                                                        <option>2020</option>
                                                                                    </select>
                                                                                </div>
                                                                            </li>
                                                                            <li class="list-inline-item">
                                                                                <div class="candidate_revew_select">
                                                                                    <select
                                                                                        class="selectpicker w100 show-tick">
                                                                                        <option>Built-up Area</option>
                                                                                        <option>Adana</option>
                                                                                        <option>Ankara</option>
                                                                                        <option>Antalya</option>
                                                                                        <option>Bursa</option>
                                                                                        <option>Bodrum</option>
                                                                                        <option>Gaziantep</option>
                                                                                        <option>İstanbul</option>
                                                                                        <option>İzmir</option>
                                                                                        <option>Konya</option>
                                                                                    </select>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="col-lg-1 col-xl-2">
                                                                        <div class="mega_dropdown_content_closer">
                                                                            <h5 class="text-thm text-right mt15"><span
                                                                                    id="hide_advbtn2"
                                                                                    class="curp">Hide</span></h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="search_option_button">
                                                        <button type="submit" class="btn btn-thm3">Search</button>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Feature Properties -->
            <section id="feature-property" class="feature-property mt80 pb50">
                <div class="container-fluid ovh">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title mb40">
                                <h2>Featured Properties</h2>
                                <p>Handpicked properties by our team. <a class="float-right" href="#">View All <span
                                            class="flaticon-next"></span></a></p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="feature_property_home3_slider">
                                <div class="item">
                                    <div class="feat_property home3">
                                        <div class="thumb">
                                            <img class="img-whp" src="{{ asset('client') }}/images/property/fp1.jpg" alt="fp1.jpg">
                                            <div class="thmb_cntnt">
                                                <ul class="tag mb0">
                                                    <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                    <li class="list-inline-item"><a href="#">Featured</a></li>
                                                </ul>
                                                <ul class="icon mb0">
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-transfer-1"></span></a></li>
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-heart"></span></a></li>
                                                </ul>
                                                <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="tc_content">
                                                <p class="text-thm">Apartment</p>
                                                <h4>Renovated Apartment</h4>
                                                <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los
                                                    Angeles, CA 90015</p>
                                                <ul class="prop_details mb0">
                                                    <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                                    <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                                    <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="feat_property home3">
                                        <div class="thumb">
                                            <img class="img-whp" src="{{ asset('client') }}/images/property/fp2.jpg" alt="fp2.jpg">
                                            <div class="thmb_cntnt">
                                                <ul class="tag mb0">
                                                    <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                    <li class="list-inline-item dn"></li>
                                                </ul>
                                                <ul class="icon mb0">
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-transfer-1"></span></a></li>
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-heart"></span></a></li>
                                                </ul>
                                                <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="tc_content">
                                                <p class="text-thm">Villa</p>
                                                <h4>Gorgeous Villa Bay View</h4>
                                                <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los
                                                    Angeles, CA 90015</p>
                                                <ul class="prop_details mb0">
                                                    <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                                    <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                                    <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="feat_property home3">
                                        <div class="thumb">
                                            <img class="img-whp" src="{{ asset('client') }}/images/property/fp3.jpg" alt="fp3.jpg">
                                            <div class="thmb_cntnt">
                                                <ul class="tag mb0">
                                                    <li class="list-inline-item"><a href="#">For Sale</a></li>
                                                    <li class="list-inline-item dn"></li>
                                                </ul>
                                                <ul class="icon mb0">
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-transfer-1"></span></a></li>
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-heart"></span></a></li>
                                                </ul>
                                                <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="tc_content">
                                                <p class="text-thm">Single Family Home</p>
                                                <h4>Luxury Family Home</h4>
                                                <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los
                                                    Angeles, CA 90015</p>
                                                <ul class="prop_details mb0">
                                                    <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                                    <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                                    <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="feat_property home3">
                                        <div class="thumb">
                                            <img class="img-whp" src="{{ asset('client') }}/images/property/fp1.jpg" alt="fp1.jpg">
                                            <div class="thmb_cntnt">
                                                <ul class="tag mb0">
                                                    <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                    <li class="list-inline-item dn"></li>
                                                </ul>
                                                <ul class="icon mb0">
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-transfer-1"></span></a></li>
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-heart"></span></a></li>
                                                </ul>
                                                <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="tc_content">
                                                <p class="text-thm">Apartment</p>
                                                <h4>Luxury Family Home</h4>
                                                <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los
                                                    Angeles, CA 90015</p>
                                                <ul class="prop_details mb0">
                                                    <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                                    <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                                    <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="feat_property home3">
                                        <div class="thumb">
                                            <img class="img-whp" src="{{ asset('client') }}/images/property/fp1.jpg" alt="fp1.jpg">
                                            <div class="thmb_cntnt">
                                                <ul class="tag mb0">
                                                    <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                    <li class="list-inline-item"><a href="#">Featured</a></li>
                                                </ul>
                                                <ul class="icon mb0">
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-transfer-1"></span></a></li>
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-heart"></span></a></li>
                                                </ul>
                                                <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="tc_content">
                                                <p class="text-thm">Apartment</p>
                                                <h4>Renovated Apartment</h4>
                                                <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los
                                                    Angeles, CA 90015</p>
                                                <ul class="prop_details mb0">
                                                    <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                                    <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                                    <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="feat_property home3">
                                        <div class="thumb">
                                            <img class="img-whp" src="{{ asset('client') }}/images/property/fp2.jpg" alt="fp2.jpg">
                                            <div class="thmb_cntnt">
                                                <ul class="tag mb0">
                                                    <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                    <li class="list-inline-item dn"></li>
                                                </ul>
                                                <ul class="icon mb0">
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-transfer-1"></span></a></li>
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-heart"></span></a></li>
                                                </ul>
                                                <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="tc_content">
                                                <p class="text-thm">Villa</p>
                                                <h4>Gorgeous Villa Bay View</h4>
                                                <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los
                                                    Angeles, CA 90015</p>
                                                <ul class="prop_details mb0">
                                                    <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                                    <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                                    <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="feat_property home3">
                                        <div class="thumb">
                                            <img class="img-whp" src="{{ asset('client') }}/images/property/fp3.jpg" alt="fp3.jpg">
                                            <div class="thmb_cntnt">
                                                <ul class="tag mb0">
                                                    <li class="list-inline-item"><a href="#">For Sale</a></li>
                                                    <li class="list-inline-item dn"></li>
                                                </ul>
                                                <ul class="icon mb0">
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-transfer-1"></span></a></li>
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-heart"></span></a></li>
                                                </ul>
                                                <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="tc_content">
                                                <p class="text-thm">Single Family Home</p>
                                                <h4>Luxury Family Home</h4>
                                                <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los
                                                    Angeles, CA 90015</p>
                                                <ul class="prop_details mb0">
                                                    <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                                    <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                                    <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="feat_property home3">
                                        <div class="thumb">
                                            <img class="img-whp" src="{{ asset('client') }}/images/property/fp1.jpg" alt="fp1.jpg">
                                            <div class="thmb_cntnt">
                                                <ul class="tag mb0">
                                                    <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                    <li class="list-inline-item dn"></li>
                                                </ul>
                                                <ul class="icon mb0">
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-transfer-1"></span></a></li>
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-heart"></span></a></li>
                                                </ul>
                                                <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="tc_content">
                                                <p class="text-thm">Apartment</p>
                                                <h4>Luxury Family Home</h4>
                                                <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los
                                                    Angeles, CA 90015</p>
                                                <ul class="prop_details mb0">
                                                    <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                                    <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                                    <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="feat_property home3">
                                        <div class="thumb">
                                            <img class="img-whp" src="{{ asset('client') }}/images/property/fp1.jpg" alt="fp1.jpg">
                                            <div class="thmb_cntnt">
                                                <ul class="tag mb0">
                                                    <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                    <li class="list-inline-item"><a href="#">Featured</a></li>
                                                </ul>
                                                <ul class="icon mb0">
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-transfer-1"></span></a></li>
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-heart"></span></a></li>
                                                </ul>
                                                <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="tc_content">
                                                <p class="text-thm">Apartment</p>
                                                <h4>Renovated Apartment</h4>
                                                <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los
                                                    Angeles, CA 90015</p>
                                                <ul class="prop_details mb0">
                                                    <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                                    <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                                    <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="feat_property home3">
                                        <div class="thumb">
                                            <img class="img-whp" src="{{ asset('client') }}/images/property/fp2.jpg" alt="fp2.jpg">
                                            <div class="thmb_cntnt">
                                                <ul class="tag mb0">
                                                    <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                    <li class="list-inline-item dn"></li>
                                                </ul>
                                                <ul class="icon mb0">
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-transfer-1"></span></a></li>
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-heart"></span></a></li>
                                                </ul>
                                                <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="tc_content">
                                                <p class="text-thm">Villa</p>
                                                <h4>Gorgeous Villa Bay View</h4>
                                                <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los
                                                    Angeles, CA 90015</p>
                                                <ul class="prop_details mb0">
                                                    <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                                    <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                                    <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="feat_property home3">
                                        <div class="thumb">
                                            <img class="img-whp" src="{{ asset('client') }}/images/property/fp3.jpg" alt="fp3.jpg">
                                            <div class="thmb_cntnt">
                                                <ul class="tag mb0">
                                                    <li class="list-inline-item"><a href="#">For Sale</a></li>
                                                    <li class="list-inline-item dn"></li>
                                                </ul>
                                                <ul class="icon mb0">
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-transfer-1"></span></a></li>
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-heart"></span></a></li>
                                                </ul>
                                                <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="tc_content">
                                                <p class="text-thm">Single Family Home</p>
                                                <h4>Luxury Family Home</h4>
                                                <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los
                                                    Angeles, CA 90015</p>
                                                <ul class="prop_details mb0">
                                                    <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                                    <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                                    <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="feat_property home3">
                                        <div class="thumb">
                                            <img class="img-whp" src="{{ asset('client') }}/images/property/fp1.jpg" alt="fp1.jpg">
                                            <div class="thmb_cntnt">
                                                <ul class="tag mb0">
                                                    <li class="list-inline-item"><a href="#">For Rent</a></li>
                                                    <li class="list-inline-item dn"></li>
                                                </ul>
                                                <ul class="icon mb0">
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-transfer-1"></span></a></li>
                                                    <li class="list-inline-item"><a href="#"><span
                                                                class="flaticon-heart"></span></a></li>
                                                </ul>
                                                <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="tc_content">
                                                <p class="text-thm">Apartment</p>
                                                <h4>Luxury Family Home</h4>
                                                <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los
                                                    Angeles, CA 90015</p>
                                                <ul class="prop_details mb0">
                                                    <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                                    <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                                    <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Property Cities -->
            <section id="property-city" class="property-city pt0 pb30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h2>Find Properties in These Cities</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a class="float-right"
                                        href="#">View All <span class="flaticon-next"></span></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl">
                            <div class="properti_city">
                                <div class="thumb"><img class="img-fluid w100" src="{{ asset('client') }}/images/property/pc7.jpg" alt="pc7.jpg">
                                </div>
                                <div class="overlay">
                                    <div class="details">
                                        <h4>Miami</h4>
                                        <p>24 Properties</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl">
                            <div class="properti_city">
                                <div class="thumb"><img class="img-fluid w100" src="{{ asset('client') }}/images/property/pc8.jpg" alt="pc8.jpg">
                                </div>
                                <div class="overlay">
                                    <div class="details">
                                        <h4>Los Angeles</h4>
                                        <p>18 Properties</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl">
                            <div class="properti_city">
                                <div class="thumb"><img class="img-fluid w100" src="{{ asset('client') }}/images/property/pc9.jpg" alt="pc9.jpg">
                                </div>
                                <div class="overlay">
                                    <div class="details">
                                        <h4>New York</h4>
                                        <p>89 Properties</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl">
                            <div class="properti_city">
                                <div class="thumb"><img class="img-fluid w100" src="{{ asset('client') }}/images/property/pc10.jpg"
                                        alt="pc10.jpg"></div>
                                <div class="overlay">
                                    <div class="details">
                                        <h4>Florida</h4>
                                        <p>47 Properties</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl">
                            <div class="properti_city">
                                <div class="thumb"><img class="img-fluid w100" src="{{ asset('client') }}/images/property/pc11.jpg"
                                        alt="pc11.jpg"></div>
                                <div class="overlay">
                                    <div class="details">
                                        <h4>Orlando</h4>
                                        <p>89 Properties</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Property Search -->
            <section id="property-search" class="property-search bg-img4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-3">
                            <div class="search_smart_property text-center">
                                <h2>Search Smarter, From Anywhere</h2>
                                <p>Power your search with our Resideo real estate platform, for timely listings and a
                                    seamless experience.</p>
                                <button class="btn ssp_btn">Search Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Property Cities -->
            <section id="best-property" class="best-property pt100 pb0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h2>Best Property Value</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a class="float-right"
                                        href="#">View All <span class="flaticon-next"></span></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-lg-4">
                            <div class="feat_property home3">
                                <div class="thumb">
                                    <img class="img-whp" src="{{ asset('client') }}/images/property/fp4.jpg" alt="fp4.jpg">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item"><a href="#">For Rent</a></li>
                                            <li class="list-inline-item dn"></li>
                                        </ul>
                                        <ul class="icon mb0">
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-transfer-1"></span></a></li>
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-heart"></span></a></li>
                                        </ul>
                                        <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <p class="text-thm">Villa</p>
                                        <h4>Gorgeous Villa Bay View</h4>
                                        <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los Angeles, CA
                                            90015</p>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                            <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                            <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="feat_property home3">
                                <div class="thumb">
                                    <img class="img-whp" src="{{ asset('client') }}/images/property/fp5.jpg" alt="fp5.jpg">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item"><a href="#">For Rent</a></li>
                                            <li class="list-inline-item"><a href="#">Featured</a></li>
                                        </ul>
                                        <ul class="icon mb0">
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-transfer-1"></span></a></li>
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-heart"></span></a></li>
                                        </ul>
                                        <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <p class="text-thm">Villa</p>
                                        <h4>Gorgeous Villa Bay View</h4>
                                        <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los Angeles, CA
                                            90015</p>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                            <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                            <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4">
                            <div class="feat_property home3">
                                <div class="thumb">
                                    <img class="img-whp" src="{{ asset('client') }}/images/property/fp6.jpg" alt="fp6.jpg">
                                    <div class="thmb_cntnt">
                                        <ul class="tag mb0">
                                            <li class="list-inline-item"><a href="#">For Rent</a></li>
                                            <li class="list-inline-item dn"></li>
                                        </ul>
                                        <ul class="icon mb0">
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-transfer-1"></span></a></li>
                                            <li class="list-inline-item"><a href="#"><span
                                                        class="flaticon-heart"></span></a></li>
                                        </ul>
                                        <a class="fp_price" href="#">$13,000<small>/mo</small></a>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <p class="text-thm">Villa</p>
                                        <h4>Luxury Family Home</h4>
                                        <p><span class="flaticon-placeholder"></span> 1421 San Pedro St, Los Angeles, CA
                                            90015</p>
                                        <ul class="prop_details mb0">
                                            <li class="list-inline-item"><a href="#">Beds: 4</a></li>
                                            <li class="list-inline-item"><a href="#">Baths: 2</a></li>
                                            <li class="list-inline-item"><a href="#">Sq Ft: 5280</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Our Agents -->
            <section id="our-agents" class="our-agents pt40 pb30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="main-title">
                                <h2>Our Agents</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a class="float-right"
                                        href="#">View All <span class="flaticon-next"></span></a></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-2">
                            <div class="our_agent">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="{{ asset('client') }}/images/team/5.jpg" alt="5.jpg">
                                    <div class="overylay">
                                        <ul class="social_icon">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4>Jennifer Barton</h4>
                                    <p>Broker <a class="float-right" href="#">4.5 <i
                                                class="fa fa-star color-golden"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-2">
                            <div class="our_agent">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="{{ asset('client') }}/images/team/6.jpg" alt="6.jpg">
                                    <div class="overylay">
                                        <ul class="social_icon">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4>Kathleen Myers</h4>
                                    <p>Agent <a class="float-right" href="#">5 <i class="fa fa-star color-golden"></i></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-2">
                            <div class="our_agent">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="{{ asset('client') }}/images/team/7.jpg" alt="7.jpg">
                                    <div class="overylay">
                                        <ul class="social_icon">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4>Mariusz Ciesla</h4>
                                    <p>Broker <a class="float-right" href="#">3.5 <i
                                                class="fa fa-star color-golden"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-2">
                            <div class="our_agent">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="{{ asset('client') }}/images/team/8.jpg" alt="8.jpg">
                                    <div class="overylay">
                                        <ul class="social_icon">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4>Helene Powers</h4>
                                    <p>Broker <a class="float-right" href="#">4.5 <i
                                                class="fa fa-star color-golden"></i></a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-2">
                            <div class="our_agent">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="{{ asset('client') }}/images/team/9.jpg" alt="9.jpg">
                                    <div class="overylay">
                                        <ul class="social_icon">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4>Jade Northon</h4>
                                    <p>Agent <a class="float-right" href="#">1.5 <i class="fa fa-star color-golden"></i></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-4 col-xl-2">
                            <div class="our_agent">
                                <div class="thumb">
                                    <img class="img-fluid w100" src="{{ asset('client') }}/images/team/10.jpg" alt="10.jpg">
                                    <div class="overylay">
                                        <ul class="social_icon">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a>
                                            </li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="details">
                                    <h4>Kevin Harris</h4>
                                    <p>Agent <a class="float-right" href="#">3.5 <i class="fa fa-star color-golden"></i></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Our Footer -->
            <section class="footer_one home3">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg col-xl">
                            <div class="footer_about_widget home3">
                                <h4>About Site</h4>
                                <p>We’re reimagining how you buy, sell and rent. It’s now easier to get into a place you
                                    love. So let’s do this, together.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg col-xl">
                            <div class="footer_qlink_widget home3">
                                <h4>Quick Links</h4>
                                <ul class="list-unstyled">
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">User’s Guide</a></li>
                                    <li><a href="#">Support Center</a></li>
                                    <li><a href="#">Press Info</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg col-xl">
                            <div class="footer_contact_widget home3">
                                <h4>Contact Us</h4>
                                <ul class="list-unstyled">
                                    <li><a href="#"><span class="__cf_email__"
                                                data-cfemail="d8b1b6beb798beb1b6bcb0b7adabbdf6bbb7b5">[email&#160;protected]</span></a>
                                    </li>
                                    <li><a href="#">Collins Street West, Victoria</a></li>
                                    <li><a href="#">8007, Australia.</a></li>
                                    <li><a href="#">+1 246-345-0699</a></li>
                                    <li><a href="#">+1 246-345-0695</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg col-xl">
                            <div class="footer_social_widget home3">
                                <h4>Follow us</h4>
                                <ul class="mb30">
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fa fa-google"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg col-xl">
                            <div class="footer_social_widget home3">
                                <h4>Subscribe</h4>
                                <form class="footer_mailchimp_form home3">
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <input type="email" class="form-control mb-2" id="inlineFormInput"
                                                placeholder="Your email">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit" class="btn btn-primary mb-2"><i
                                                    class="fa fa-angle-right"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Our Footer Bottom Area -->
            <section class="footer_middle_area home3 pt30 pb30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-6 col-xl-6">
                            <div class="footer_menu_widget home3">
                                <ul>
                                    <li class="list-inline-item"><a href="#">Home</a></li>
                                    <li class="list-inline-item"><a href="#">Listing</a></li>
                                    <li class="list-inline-item"><a href="#">Property</a></li>
                                    <li class="list-inline-item"><a href="#">Pages</a></li>
                                    <li class="list-inline-item"><a href="#">Blog</a></li>
                                    <li class="list-inline-item"><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-6">
                            <div class="copyright-widget home3 text-right">
                                <p>© 2020 Find House. Made with love.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <a class="scrollToHome text-thm3" href="#"><i class="flaticon-arrows"></i></a>
        </div>
        <script src="{{ asset(mix('js/app.js')) }}"></script>
        <!-- Wrapper End -->
        {{--  <script data-cfasync="false" src="{{ asset('client') }}/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>  --}}
        <script type="text/javascript" src="{{ asset('client') }}/js/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="{{ asset('client') }}/js/jquery-migrate-3.0.0.min.js"></script>
        <script type="text/javascript" src="{{ asset('client') }}/js/popper.min.js"></script>
        <script type="text/javascript" src="{{ asset('client') }}/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="{{ asset('client') }}/js/jquery.mmenu.all.js"></script>
        <script type="text/javascript" src="{{ asset('client') }}/js/ace-responsive-menu.js"></script>
        <script type="text/javascript" src="{{ asset('client') }}/js/bootstrap-select.min.js"></script>
        <script type="text/javascript" src="{{ asset('client') }}/js/isotop.js"></script>
        <script type="text/javascript" src="{{ asset('client') }}/js/snackbar.min.js"></script>
        <script type="text/javascript" src="{{ asset('client') }}/js/simplebar.js"></script>
        <script type="text/javascript" src="{{ asset('client') }}/js/parallax.js"></script>
        <script type="text/javascript" src="{{ asset('client') }}/js/scrollto.js"></script>
        <script type="text/javascript" src="{{ asset('client') }}/js/jquery-scrolltofixed-min.js"></script>
        <script type="text/javascript" src="{{ asset('client') }}/js/jquery.counterup.js"></script>
        <script type="text/javascript" src="{{ asset('client') }}/js/wow.min.js"></script>
        <script type="text/javascript" src="{{ asset('client') }}/js/slider.js"></script>
        <script type="text/javascript" src="{{ asset('client') }}/js/timepicker.js"></script>
        <!-- Custom script for all pages -->
        <script type="text/javascript" src="{{ asset('client') }}/js/script.js"></script>
        {{--  <script src="{{ asset(mix('js/app.js')) }}"></script>  --}}
    </body>

</html>