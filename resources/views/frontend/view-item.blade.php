@extends('layouts.marketplace-layout')

@section('title')
    Product Details
@endsection
@section('current-page')
    Product Details
@endsection

@include('partials.marketplace._header')
<body>
<div class="page-wrapper">
    <h1 class="d-none">CNX Retail</h1>
    <!-- Start of Header -->
    <header class="header header-border">
        <div class="header-middle">
            <div class="container">
                @include('partials.marketplace._search-bar')
            </div>
        </div>
        <div class="header-bottom sticky-content fix-top sticky-header">
            <div class="container">
                <div class="inner-wrap">
                    <div class="header-left">
                        <div class="dropdown category-dropdown has-border" data-visible="true">
                            <a href="#" class="category-toggle" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="true" data-display="static"
                               title="Browse Categories">
                                <i class="w-icon-category"></i>
                                <span>Browse Categories</span>
                            </a>
                            <div class="dropdown-box">
                                <ul class="menu vertical-menu category-menu">
                                    @foreach($categories as $cat)
                                        <li>
                                            <a href="{{route('product-category', $cat->slug)}}">
                                                <i class="w-icon-angle-right"></i>{{$cat->category_name ?? '' }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <nav class="main-nav">
                            <ul class="menu active-underline">
                                <li>
                                    <a href="{{route('homepage')}}">Home</a>
                                </li>
                                <li>
                                    <a href="{{route('marketplace')}}">Marketplace</a>
                                </li>
                                <li>
                                    <a href="{{route('contact-us')}}">Contact us</a>
                                </li>
                                <li>
                                    <a href="{{route('login')}}">Login</a>
                                </li>
                                <li>
                                    <a href="{{route('register')}}">Start Trial</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @section('main-content')
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content">
                    <div class="product product-single row">
                        <div class="col-md-6 mb-4 mb-md-8">
                            <div class="product-gallery product-gallery-sticky">
                                <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                    <div class="swiper-wrapper row cols-1 gutter-no">
                                        @foreach($item->getItemGalleryImages as $image)
                                            <div class="swiper-slide">
                                            <figure class="product-image">
                                                <img src="/assets/drive/{{$image->attachment ?? '' }}"
                                                     data-zoom-image="/assets/drive/{{$image->attachment ?? '' }}"
                                                     alt="{{$item->item_name ?? '' }}" width="800" height="900">
                                            </figure>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button class="swiper-button-next"></button>
                                    <button class="swiper-button-prev"></button>
                                    <a href="#" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a>
                                </div>
                                <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                            'navigation': {
                                                'nextEl': '.swiper-button-next',
                                                'prevEl': '.swiper-button-prev'
                                            }
                                        }">
                                    <div class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                                        @foreach($item->getItemGalleryImages as $image)
                                        <div class="product-thumb swiper-slide">
                                            <img src="/assets/drive/{{$image->attachment ?? '' }}"
                                                 alt="{{$item->item_name ?? '' }}" width="800" height="900">
                                        </div>
                                        @endforeach
                                    </div>
                                    <button class="swiper-button-next"></button>
                                    <button class="swiper-button-prev"></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-6 mb-md-8">
                            <div class="product-details" data-sticky-options="{'minWidth': 767}">
                                <h1 class="product-title">{{$item->item_name ?? '' }}</h1>
                                <div class="product-bm-wrapper">
                                    <div class="product-meta">
                                        <div class="product-categories">
                                            Category:
                                            <span class="product-category"><a href="#">{{ $item->getCategory->category_name ?? '' }}</a></span>
                                        </div>
                                    </div>
                                </div>

                                <hr class="product-divider">

                                <div class="product-price">
                                    <ins class="new-price">₦{{number_format($item->selling_price,2)}}</ins>
                                </div>
                                <hr class="product-divider">
                            </div>
                        </div>
                    </div>
                    <div class="tab tab-nav-boxed tab-nav-underline product-tabs">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#product-tab-description" class="nav-link active">Description</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="product-tab-description">
                                <div class="row mb-4">
                                    <div class="col-md-6 mb-5">
                                        <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                                        {!! $item->description ?? '' !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->
                <aside class="sidebar product-sidebar sidebar-fixed right-sidebar sticky-sidebar-wrapper">
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                    <a href="#" class="sidebar-toggle d-flex d-lg-none"><i class="fas fa-chevron-left"></i></a>
                    <div class="sidebar-content scrollable">
                        <div class="sticky-sidebar">
                            <div class="widget widget-icon-box mb-6">
                                <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-truck"></i>
                                            </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">Seller</h4>
                                        <p>{{$item->getTenant->company_name ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="icon-box icon-box-side">
                                            <span class="icon-box-icon text-dark">
                                                <i class="w-icon-bag"></i>
                                            </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">Email</h4>
                                        <p>{{$item->getTenant->email ?? '' }}</p>
                                    </div>
                                </div>
                                <div class="icon-box icon-box-side">
                                    <span class="icon-box-icon text-dark">
                                        <i class="w-icon-phone"></i>
                                    </span>
                                    <div class="icon-box-content">
                                        <h4 class="icon-box-title">Phone No.</h4>
                                        <p>{{$item->getTenant->phone_no ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    @endsection
</div>
<a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70"> <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35" r="34" style="stroke-dasharray: 16.4198, 400;"></circle> </svg> </a>

@include('partials.marketplace._footer-script')
