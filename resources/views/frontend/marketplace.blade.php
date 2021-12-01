@extends('layouts.frontend-layout')

@section('title')
    Marketplace
@endsection
@section('page-title')

@endsection
@section('main-content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">Marketplace</h2>
                    <span class="ipn-subtitle">Browse All Products</span>

                </div>
            </div>
        </div>
    </div>
    <section class="gray-bg">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="simple-sidebar sm-sidebar">

                        <div class="search-sidebar_header">
                            <h4 class="ssh_heading">Search Filter</h4>
                            <a href="javascript:void(0);" class="clear_all">Clear All</a><a href="#search_open" data-toggle="collapse" aria-expanded="false" role="button" class="collapsed _filter-ico"><i class="fa fa-sliders"></i></a>
                        </div>

                        <!-- Find New Property -->
                        <div class="sidebar-widgets collapse miz_show" id="search_open" data-parent="#search_open">

                            <div class="search-inner p-0">

                                <div class="filter-search-box pb-0">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search by keywords...">
                                    </div>
                                </div>

                                <div class="filter_wraps">

                                    <!-- Job categories Search -->
                                    <div class="single_search_boxed">
                                        <div class="widget-boxed-header">
                                            <h4>
                                                <a href="#categories" data-toggle="collapse" aria-expanded="true" role="button">Product Categories</a>
                                            </h4>
                                        </div>
                                        <div class="widget-boxed-body collapse show" id="categories" data-parent="#categories">
                                            <div class="side-list no-border">
                                                <!-- Single Filter Card -->
                                                <div class="single_filter_card">
                                                    <div class="card-body pt-0">
                                                        <div class="inner_widget_link">
                                                            <ul class="no-ul-list filter-list">
                                                                @foreach($categories as $category)
                                                                    <li>
                                                                    <input id="a1" class="checkbox-custom" name="ADA" type="checkbox" >
                                                                    <label for="a1" class="checkbox-custom-label">{{$category->category_name ?? '' }}</label>
                                                                </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar End -->

                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="_filt_tag786">
                                <div class="_tag782">
                                    <div class="_tag780">{{$items->count()}} Products</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach($items as $item)
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="ser_110 shadow_0">
                                    <div class="ser_110_thumb">
                                        <a href="{{route('view-item', $item->slug)}}" class="ser_100_link">
                                            <img style="width: 255px; height: 300px;" src="/assets/drive/{{$item->getItemFirstGalleryImage($item->id)->attachment ?? 'image.jpg'}}" class="img-fluid" alt=""></a>
                                    </div>
                                    <div class="ser_110_footer bott">
                                        <div class="_110_foot_left">
                                            <div class="_autho097">
                                                <h5><a href="#">{{$item->getTenant->company_name ?? '' }}</a></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ser_110_caption">
                                        <div class="ser_title098">
                                            <h4 class="_ser_title"><a href="{{route('view-item', $item->slug)}}">{{ strlen($item->item_name) > 28 ? substr($item->item_name,0,25).'...' : $item->item_name}}</a></h4>
                                        </div>
                                        <div class="_oi0po">
                                            Price<strong class="theme-cl">₦{{number_format($item->selling_price,2)}}</strong>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection


