@extends('layouts.master-layout')
@section('active-page')
    Dashboard
@endsection

@section('breadcrumb-action-btn')
    <a href="#" class="btn btn-primary btn-icon text-white mr-2">
            <span>
                <i class="fe fe-shopping-cart"></i>
            </span> Add Order
    </a>
    <a href="#" class="btn btn-secondary btn-icon text-white">
            <span>
                <i class="fe fe-plus"></i>
            </span> Add User
    </a>
@endsection

@section('main-content')
    <!-- ROW-1 -->
    <div class="row">
        <div class="col-md-12">
            <div class="card  banner">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-lg-2 text-center">
                            <img src="/assets/images/pngs/profit.png" id="greeting-image" alt="img" class="w-95">
                        </div>
                        <div class="col-xl-9 col-lg-10 pl-lg-0">
                            <div class="row">
                                <div class="col-xl-7 col-lg-6">
                                    <div class="text-left text-white mt-xl-4">
                                        <h3 class="font-weight-semibold"><span id="greeting"></span> {{Auth::user()->first_name ?? '' }}</h3>
                                        <q>{{$motivation->motivation ?? ''}}</q>
                                        <blockquote class="mt-3">{{$motivation->author ?? 'Unknown'}}</blockquote>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-6 text-lg-center mt-xl-4">
                                    <h5 class="font-weight-semibold mb-1 text-white">This Month's Sales</h5>
                                    <h2 class="display-2 mb-3 number-font text-white">{{'₦'.number_format($thisMonth->sum('amount'),2)}}</h2>
                                    <div class="btn-list mb-xl-0">
                                        <a href="{{route('manage-receipts')}}" class="btn btn-dark mb-xl-0">Check Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-1 End-->

    <!-- Row -->
    <div class="row">

        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-1">
                        <div class="col">
                            <p class="mb-1">Revenue <small>(Inflow)</small></p>
                            <h3 class="mb-0 number-font">{{'₦'.number_format($receipts->where('posted',1)->sum('amount'))}}</h3>
                        </div>
                        <div class="col-auto mb-0">
                            <div class="dash-icon text-secondary1">
                                <i class="bx bxs-wallet"></i>
                            </div>
                        </div>
                    </div>
                    <span class="fs-12 text-muted"> <span class="text-muted fs-12 ml-0 mt-1">This Year</span></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-1">
                        <div class="col">
                            <p class="mb-1">Expenses <small>(Outflow)</small></p>
                            <h3 class="mb-0 number-font">{{'₦'.number_format($payments->where('posted',1)->sum('amount'))}}</h3>
                        </div>
                        <div class="col-auto mb-0">
                            <div class="dash-icon text-orange">
                                <i class="bx bxs-shopping-bags"></i>
                            </div>
                        </div>
                    </div>
                    <span class="fs-12 text-muted"> <span class="text-muted fs-12 ml-0 mt-1">This Year</span></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-1">
                        <div class="col">
                            <p class="mb-1">Unpaid Invoices</p>
                            <h3 class="mb-0 number-font">{{'₦'.number_format(($invoices->where('posted',1)->sum('total')) - ($invoices->where('posted',1)->sum('paid_amount')))}}</h3>
                        </div>
                        <div class="col-auto mb-0">
                            <div class="dash-icon text-secondary">
                                <i class="bx bxs-badge-dollar"></i>
                            </div>
                        </div>
                    </div>
                    <span class="fs-12 text-muted">  <span class="text-muted fs-12 ml-0 mt-1">This Year</span></span>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-1">
                        <div class="col">
                            <p class="mb-1">Unpaid Bills</p>
                            <h3 class="mb-0 number-font">{{'₦'.number_format(($bills->where('posted',1)->sum('bill_amount')) - ($bills->where('posted',1)->sum('paid_amount')))}}</h3>
                        </div>
                        <div class="col-auto mb-0">
                            <div class="dash-icon text-warning">
                                <i class="bx bxs-credit-card-front"></i>
                            </div>
                        </div>
                    </div>
                    <span class="fs-12 text-muted"> <strong>1.05%</strong><i class="mdi mdi-arrow-up"></i> <span class="text-muted fs-12 ml-0 mt-1">than last week</span></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Row-1 End -->

    <!-- ROW-2 -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <h3 class="card-title">Monthly Sales Statistics</h3>
                </div>
                <div class="card-body">
                    <div id="sales" class=""></div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-2 END -->
    <!-- ROW-4 -->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Orders</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-nowrap mb-0">
                            <thead>
                            <tr>
                                <th>Receipt No.</th>
                                <th>Customer</th>
                                <th>Bank</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $serial = 1; @endphp
                                @foreach($receipts->take(10) as $receipt)
                                    <tr>
                                    <td>#{{$receipt->receipt_no ?? '' }}</td>
                                    <td>{{$receipt->getContact->company_name ?? '' }}</td>
                                    <td>{{$receipt->getBank->bank ?? '' }} ({{$receipt->getBank->account_no ?? ''}})</td>
                                    <td class="">{{'₦'.number_format($receipt->amount,2)}}</td>
                                    <td>{{date('d M, Y', strtotime($receipt->created_at))}}</td>
                                    <td>
                                        <a href="{{route('view-receipt', $receipt->slug)}}" class=""><i class="ti-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Activity</h3>
                </div>
                <div class="card-body">
                    <div class="activity-block">
                        <ul class="task-list user-tasks">
                            <li>
                                <span class="avatar avatar-md brround cover-image task-icon1" data-image-src="../assets/images/users/1.jpg"></span>
                                <h6>Successful Purchase<small class="float-right text-muted tx-11">29 Mar 2020</small></h6>
                                <span class="text-muted tx-12">Order ID: #4567</span>
                            </li>
                            <li>
                                <span class="avatar avatar-md brround cover-image task-icon1" data-image-src="../assets/images/users/2.jpg"></span>
                                <h6>New Registered Seller<small class="float-right text-muted tx-11">25 Mar 2020</small></h6>
                                <span class="text-muted tx-12">User ID: #8976</span>
                            </li>
                            <li>
                                <span class="avatar avatar-md brround cover-image task-icon1 bg-pink">H</span>
                                <h6>Order Verification<small class="float-right text-muted tx-11">14 Feb 2020</small></h6>
                                <span class="text-muted tx-12">Order ID: #6290</span>
                            </li>
                            <li>
                                <span class="avatar avatar-md brround cover-image task-icon1" data-image-src="../assets/images/users/8.jpg"></span>
                                <h6>New Item Added<small class="float-right text-muted tx-11">02 Feb 2020</small></h6>
                                <span class="text-muted tx-12">Item ID: #0235</span>
                            </li>
                            <li>
                                <span class="avatar avatar-md brround cover-image task-icon1" data-image-src="../assets/images/users/9.jpg"></span>
                                <h6>Purchase Cancellation<small class="float-right text-muted tx-11">28 Jan 2020</small></h6>
                                <span class="text-muted tx-12">Order ID: #1905</span>
                            </li>
                            <li class="mb-0">
                                <span class="avatar avatar-md brround cover-image task-icon1 bg-success">M</span>
                                <h6>Overdue Shipments<small class="float-right text-muted tx-11">25 Jan 2020</small></h6>
                                <span class="text-muted tx-12">Order ID: #8902</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-4 END -->

    <!-- ROW-5 -->
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recently Contacts</h3>
                </div>
                <div class="customer-scroll">
                    @foreach($contacts->take(5) as $contact)
                        <div class="list-group-item d-flex  align-items-center border-top-0 border-left-0 border-right-0">
                        <div class="">
                            <div class="font-weight-semibold">{{$contact->company_name ?? '' }}</div>
                            <small class="text-muted">{{$contact->contact_first_name ?? '' }} {{$contact->contact_last_name ?? '' }}
                            </small>
                        </div>
                        <div class="ml-auto">
                            <a href="{{route('view-contact', $contact->slug)}}" class="btn btn-sm btn-default">View</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div><!-- COL END -->
        <div class="col-lg-8 col-md-12 col-sm-12 col-xl-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Top Selling Products</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table card-table border table-vcenter text-nowrap align-items-center">
                            <thead class="">
                            <tr>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    <img src="../assets/images/pngs/1.png" alt="img" class="h-7 w-7">
                                    <p class="d-inline-block align-middle mb-0 ml-1">
                                        <a href="#" class="d-inline-block align-middle mb-0 product-name text-dark font-weight-semibold">Arm Chair</a>
                                        <br>
                                        <span class="text-muted fs-13">Office Chair</span>
                                    </p>
                                </td>
                                <td>Home Accessories</td>
                                <td class="font-weight-semibold fs-15">$59.00</td>
                                <td><span class="badge badge-danger-light badge-md">Sold</span></td>
                                <td>
                                    <a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="../assets/images/pngs/2.png" alt="img" class="h-7 w-7">
                                    <p class="d-inline-block align-middle mb-0 ml-1">
                                        <a href="#" class="d-inline-block align-middle mb-0 product-name text-dark font-weight-semibold">Arm Chair</a>
                                        <br>
                                        <span class="text-muted fs-13">T-Shirt</span>
                                    </p>
                                </td>
                                <td>Mens Wear</td>
                                <td class="font-weight-semibold fs-15">$45.00</td>
                                <td><span class="badge badge-danger-light badge-md">Sold</span></td>
                                <td>
                                    <a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="../assets/images/pngs/3.png" alt="img" class="h-7 w-7">
                                    <p class="d-inline-block align-middle mb-0 ml-1">
                                        <a href="#" class="d-inline-block align-middle mb-0 product-name text-dark font-weight-semibold">Arm Chair</a>
                                        <br>
                                        <span class="text-muted fs-13">Watch</span>
                                    </p>
                                </td>
                                <td>Men Accessories</td>
                                <td class="font-weight-semibold fs-15">$123.00</td>
                                <td><span class="badge badge-danger-light badge-md">Sold</span></td>
                                <td>
                                    <a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="../assets/images/pngs/4.png" alt="img" class="h-7 w-7">
                                    <p class="d-inline-block align-middle mb-0 ml-1">
                                        <a href="#" class="d-inline-block align-middle mb-0 product-name text-dark font-weight-semibold">Arm Chair</a>
                                        <br>
                                        <span class="text-muted fs-13">Hand Bag</span>
                                    </p>
                                </td>
                                <td>Women Accessories</td>
                                <td class="font-weight-semibold fs-15">$98.00</td>
                                <td><span class="badge badge-danger-light badge-md">Sold</span></td>
                                <td>
                                    <a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW-5 END -->
@endsection
@section('extra-scripts')
    <script src="/assets/js/circle-progress.min.js"></script>
    <script src="/assets/plugins/chart/Chart.bundle.js"></script>
    <script src="/assets/plugins/chart/utils.js"></script>
    <script src="/assets/plugins/peitychart/jquery.peity.min.js"></script>
    <script src="/assets/plugins/peitychart/peitychart.init.js"></script>
    <script src="/assets/js/apexcharts.js"></script>
    <script src="/assets/js/index1.js"></script>
    <script src="/assets/js/custom.js"></script>
    <script>
        $(document).ready(function(){
            var now = new Date();
            var hrs = now.getHours();
            var msg = "";
            var src = "";
            if (hrs >  0){
                msg = "Morning";
                src = "/assets/drive/good-morning.jpg";

            } // REALLY early
            if (hrs >  6) {msg = "Good morning"; src = "/assets/drive/good-morning.jpg"; }     // After 6am
            if (hrs >= 12) {msg = "Good afternoon"; src = "/assets/drive/good-afternoon.jpg";}    // After 12pm
            if (hrs >= 16) {msg = "Good evening"; src = "/assets/drive/good-evening.jpg";}      // After 5pm
            if (hrs > 22) {msg = "Well done!"; src = "/assets/drive/late-night.jpg"; }        // After 10pm
            $('#greeting').text(msg);
            $('#greeting-image').attr('src',src);
            console.log(hrs);
        });

    </script>
@endsection
