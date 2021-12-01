@extends('layouts.frontend-layout')

@section('title')
    Product Details
@endsection
@section('page-title')

@endsection
@section('main-content')
    <div class="page-title inner-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <h2 class="ipt-title">Product Details</h2>
                </div>
            </div>
        </div>
        <div class="ht-80"></div>
    </div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @php $index = 1; @endphp
                            @foreach($item->getItemGalleryImages as $image)
                            <div class="carousel-item {{$index == 1 ? 'active' : '' }}">
                                <input type="hidden" value="{{$index++}}">
                                <img style="width: 730px; height: 487px;" class="d-block w-100" src="/assets/drive/{{$image->attachment ?? '' }}" alt="First slide">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div class="_job_detail_box">
                        <div class="_job_detail_single">
                            <h4>Description</h4>
                            {!! $item->description ?? '' !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">

                    <div class="_jb_summary">
                        <h4>Interested in this product?</h4>
                        <div class="_cnt_person">
                            <div class="_cnt_person_thumb">
                                <img src="assets/img/team-3.jpg" class="img-fluid circle" alt="" />
                            </div>
                            <div class="_cnt_person_caption">
                                <span>Contact Seller</span>
                                <h4 class="_cnt_title">{{$item->getTenant->company_name ?? '' }}</h4>
                                <p class="_cnt_post">{{$item->getTenant->email ?? '' }}</p>
                                <p class="_cnt_post">{{$item->getTenant->phone_no ?? '' }}</p>
                            </div>
                        </div>
                        <div class="_apply_form_form">
                            @if(session()->has('success'))
                                <div class="alert alert-success" role="alert">
                                    {!! session()->get('success') !!}
                                </div>
                            @endif

                            <form action="{{route('buyer-request')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>First Name:</label>
                                    <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control" placeholder="First Name" />
                                    @error('first_name') <i class="text-danger mt-2">{{$message}}</i> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Your E-mail:</label>
                                    <input type="email" class="form-control" value="{{old('email')}}" placeholder="Email address" name="email" />
                                    @error('email') <i class="text-danger mt-2">{{$message}}</i> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Phone Number:</label>
                                    <input type="text" class="form-control" placeholder="Mobile No." name="mobile_no" value="{{old('mobile_no')}}" />
                                    @error('mobile_no') <i class="text-danger mt-2">{{$message}}</i> @enderror
                                </div>
                                <div class="form-group">
                                    <label>Message:</label>
                                    <textarea name="message" style="resize: none;" class="form-control" placeholder="Type message here...">{{old('message')}}</textarea>
                                    @error('message') <i class="text-danger mt-2">{{$message}}</i> @enderror
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="item" value="{{$item->id}}">
                                    <button type="submit" class="btn_applynow">Send Request</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection


