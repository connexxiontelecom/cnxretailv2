@extends('layouts.frontend-layout')

@section('title')
    Home
@endsection

@section('main-content')
    <div class="hero-banner full jumbo-banner" style="background:#f4f9fd url(assets/assets/img/bg2.png);">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-7 col-md-8">
                    <h1>Organize <span class="text-info">Your Sales</span> Processes!</h1>
                    <p class="lead">All in one place.</p>
                        <div class="row m-0">
                            <div class="col-lg-12 col-md-12 col-sm-12 p-0">
                                <div class="btn-group">
                                    <a href="{{route('contact-us')}}" class="btn dark-3  r-radius">Send Request</a>
                                    <a href="{{route('register')}}" class="btn dark-2  r-radius">Start Trial</a>
                                </div>
                            </div>
                        </div>

                </div>

                <div class="col-lg-5 col-md-4">
                    <img src="/assets/assets/img/a-2.png" alt="latest property" class="img-fluid">
                </div>

            </div>
        </div>
    </div>
    <section class="how-it-works">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9">
                    <div class="sec-heading">
                        <h2>How It <span class="theme-cl-2">Works?</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="working-process"><span class="process-img"><img src="/assets/assets/img/step-1.png" class="img-responsive" alt=""><span class="process-num">01</span></span>
                        <h4>Create An Account</h4>
                        <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="working-process"><span class="process-img"><img src="/assets/assets/img/step-2.png" class="img-responsive" alt=""><span class="process-num">02</span></span>
                        <h4>Search Jobs</h4>
                        <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="working-process"><span class="process-img"><img src="/assets/assets/img/step-3.png" class="img-responsive" alt=""><span class="process-num">03</span></span>
                        <h4>Save &amp; Apply</h4>
                        <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="min-sec">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9">
                    <div class="sec-heading">
                        <h2>Featured <span class="theme-cl-2">Products</span></h2>
                        <p>These products are randomly selected from our various vendors on the platform.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @foreach($items as $item)
                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                        <div class="job_grid_02">
                            <div class="blog-thumb">
                                <a href="{{route('view-item', $item->slug)}}">
                                    <img style="width: 255px; height: 300px;" src="/assets/drive/{{$item->getItemFirstGalleryImage($item->id)->attachment ?? 'image.jpg'}}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <div class="jb_grid_01_caption">
                                <h4 class="_jb_title" style="margin-top: 20px;">
                                    <a href="{{route('view-item', $item->slug)}}" title="{{$item->item_name ?? '' }}">{{ strlen($item->item_name) > 28 ? substr($item->item_name,0,25).'...' : $item->item_name}}</a>
                                </h4>
                            </div>
                            <div class="jb_grid_01_footer" style="margin-top:-20px;">
                                <a href="{{route('view-item', $item->slug)}}" class="_jb_apply">View Product</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="mt-3 text-center">
                        <a href="{{route('marketplace')}}" class="_browse_more-2 light">Visit Marketplace</a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="light-w">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9">
                    <div class="sec-heading">
                        <h2>Featured <span class="theme-cl-2">Services</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="owl-carousel owl-theme middle-arrow-hover" id="theme-slide">

                        <div class="themes-slides">
                            <div class="_jb_list73">
                                <div class="_jb_list73_header">
                                    <div class="jobs-like bookmark">
                                        <label class="toggler toggler-danger">
                                            <input type="checkbox">
                                            <i class="fa fa-bookmark"></i>
                                        </label>
                                    </div>
                                    <div class="_jb_list72_flex">
                                        <div class="_jb_list72_first">
                                            <div class="_jb_list72_yhumb small-thumb">
                                                <img src="assets/img/c-1.png" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                        <div class="_jb_list72_last">
                                            <h4 class="_jb_title"><a href="employer-detail.html">Google Inc</a></h4>
                                            <div class="_times_jb">USA, Sans Fransico</div>
                                        </div>
                                    </div>
                                    <div class="_jb_list72_foot">
                                        <div class="_times_jb text-right">24/8/2021</div>
                                    </div>
                                </div>
                                <div class="_jb_list73_middle">
                                    <div class="_jb_list73_middle_flex">
                                        <h4 class="_jb_title"><a href="job-detail.html">Sr. Software Developer</a></h4>
                                        <div class="_times_jb">$80k - $100k/year</div>
                                    </div>
                                    <div class="_middle_last">
                                        <div class="_jb_types fulltime_lite">Full Time</div>
                                    </div>
                                </div>
                                <div class="_jb_list73_footer">
                                    <ul class="applieded_list">
                                        <li><a href="javascript:void(0);" class="ng-scope"><img src="assets/img/team-1.jpg" class="img-responsive img-circle" alt=""></a></li>
                                        <li><a href="javascript:void(0);" class="ng-scope"><img src="assets/img/team-2.jpg" class="img-responsive img-circle" alt=""></a></li>
                                        <li><a href="javascript:void(0);" class="ng-scope"><img src="assets/img/team-3.jpg" class="img-responsive img-circle" alt=""></a></li>
                                        <li><a href="javascript:void(0);" class="ng-scope"><img src="assets/img/team-4.jpg" class="img-responsive img-circle" alt=""></a></li>
                                        <li><a href="javascript:void(0);" class="ng-scope"><span class="no_thumb">AM</span></a></li>
                                        <li><a href="javascript:void(0);" class="nore_applied"><span>17+</span>People Applied</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="gray-light">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9">
                    <div class="sec-heading">
                        <h2>What People <span class="theme-cl-2">Saying</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="owl-carousel owl-theme middle-arrow-hover" id="reviews-slide">

                        <!-- Single Review -->
                        <div class="item testimonial-center">
                            <div class="smart-tes-author">
                                <div class="st-author-box">
                                    <div class="st-author-thumb">
                                        <img src="assets/img/team-1.jpg" class="img-fluid" alt="" />
                                    </div>
                                    <div class="st-author-info">
                                        <h4 class="st-author-title">Adam Williams</h4>
                                        <span class="st-author-subtitle theme-cl">CEO Of Microwoft</span>
                                    </div>
                                </div>
                            </div>
                            <div class="smart-tes-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                            </div>
                        </div>

                        <!-- Single Review -->
                        <div class="item testimonial-center">
                            <div class="smart-tes-author">
                                <div class="st-author-box">
                                    <div class="st-author-thumb">
                                        <img src="assets/img/team-2.jpg" class="img-fluid" alt="" />
                                    </div>
                                    <div class="st-author-info">
                                        <h4 class="st-author-title">Lilly Wikdoner</h4>
                                        <span class="st-author-subtitle theme-cl">Content Writer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="smart-tes-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                            </div>
                        </div>

                        <!-- Single Review -->
                        <div class="item testimonial-center">
                            <div class="smart-tes-author">
                                <div class="st-author-box">
                                    <div class="st-author-thumb">
                                        <img src="assets/img/team-3.jpg" class="img-fluid" alt="" />
                                    </div>
                                    <div class="st-author-info">
                                        <h4 class="st-author-title">Shaurya Williams</h4>
                                        <span class="st-author-subtitle theme-cl">Manager Of Doodle</span>
                                    </div>
                                </div>
                            </div>
                            <div class="smart-tes-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                            </div>
                        </div>

                        <!-- Single Review -->
                        <div class="item testimonial-center">
                            <div class="smart-tes-author">
                                <div class="st-author-box">
                                    <div class="st-author-thumb">
                                        <img src="assets/img/team-4.jpg" class="img-fluid" alt="" />
                                    </div>
                                    <div class="st-author-info">
                                        <h4 class="st-author-title">Shrithi Setthi</h4>
                                        <span class="st-author-subtitle theme-cl">CEO Of Applio</span>
                                    </div>
                                </div>
                            </div>
                            <div class="smart-tes-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <section id="download-app">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-6 col-md-6">
                    <div class="_setup_process">
                        <h2>Download App Free App For <span class="theme-cl-2">Android And IPhone</span></h2>
                        <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                    </div>
                    <div class="btn-box clearfix mt-5">
                        <a href="index.html" class="download-btn play-store">
                            <i class="fa fa-android"></i>
                            <span>Download on</span>
                            <h3>Google Play</h3>
                        </a>

                        <a href="index.html" class="download-btn app-store">
                            <i class="fa fa-apple"></i>
                            <span>Download on</span>
                            <h3>App Store</h3>
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <img src="/assets/assets/img/app.png" class="img-fluid" alt="">
                </div>

            </div>
        </div>
    </section>
    <section class="min-sec">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-9">
                    <div class="sec-heading">
                        <h2>Latest Updates & News</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </div>
            </div>

            <div class="row">

                <!-- Single blog Grid -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="blog-wrap-grid">

                        <div class="blog-thumb">
                            <a href="blog-detail.html"><img src="assets/img/b-1.jpg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="blog-info">
                            <span class="post-date">By Shilpa Sheri</span>
                        </div>

                        <div class="blog-body">
                            <h4 class="bl-title"><a href="blog-detail.html">Why people choose listio for own properties</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. </p>
                        </div>

                        <div class="blog-cates">
                            <ul>
                                <li><a href="#" class="blog-cates-list style-4">Health</a></li>
                                <li><a href="#" class="blog-cates-list style-3">Business</a></li>
                            </ul>
                        </div>

                    </div>
                </div>

                <!-- Single blog Grid -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="blog-wrap-grid">

                        <div class="blog-thumb">
                            <a href="blog-detail.html"><img src="assets/img/b-2.jpg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="blog-info">
                            <span class="post-date">By Shaurya</span>
                        </div>

                        <div class="blog-body">
                            <h4 class="bl-title"><a href="blog-detail.html">List of benifits and impressive listeo services</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. </p>
                        </div>

                        <div class="blog-cates">
                            <ul>
                                <li><a href="#" class="blog-cates-list style-1">Banking</a></li>
                                <li><a href="#" class="blog-cates-list style-5">Stylish</a></li>
                            </ul>
                        </div>

                    </div>
                </div>

                <!-- Single blog Grid -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="blog-wrap-grid">

                        <div class="blog-thumb">
                            <a href="blog-detail.html"><img src="assets/img/b-3.jpg" class="img-fluid" alt=""></a>
                        </div>

                        <div class="blog-info">
                            <span class="post-date">By Admin K.</span>
                        </div>

                        <div class="blog-body">
                            <h4 class="bl-title"><a href="blog-detail.html">What people says about listio properties</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore. </p>
                        </div>

                        <div class="blog-cates">
                            <ul>
                                <li><a href="#" class="blog-cates-list style-1">Fashion</a></li>
                                <li><a href="#" class="blog-cates-list style-2">Wedding</a></li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection


