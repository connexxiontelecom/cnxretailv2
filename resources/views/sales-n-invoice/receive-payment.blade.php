@extends('layouts.master-layout')
@section('active-page')
    Receive Payment
@endsection
@section('title')
    Receive Payment
@endsection
@section('extra-styles')
    <link href="/assets/plugins/select2/select2.min.css" rel="stylesheet"/>
@endsection
@section('breadcrumb-action-btn')
    @include('sales-n-invoice.partials._invoice-menu')
@endsection

@section('main-content')
    @if(session()->has('success'))
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-success mb-4">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Great!</strong>
                            <hr class="message-inner-separator">
                            <p>{!! session()->get('success') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(session()->has('error'))
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-warning mb-4">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <strong>Whoops!</strong>
                            <hr class="message-inner-separator">
                            <p>{!! session()->get('error') !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('process-payment')}}" method="post" autocomplete="off">
                @csrf
                <div class="card">
                    <div class="card-body" id="receiptWrapper">
                        <div class="clearfix">
                            <div class="float-left">
                                <h3 class="card-title mb-0">#INV-{{$invoice->invoice_no ?? '' }}</h3>
                            </div>
                            <div class="float-right">
                                <p class="mb-1"><span class="font-weight-bold">Invoice Date :</span> {{date('d M, Y', strtotime($invoice->issue_date))}}</p>
                                <p class="mb-0"><span class="font-weight-bold">Due Date :</span> {{date('d M, Y', strtotime($invoice->due_date))}}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-6 ">
                                <p class="h3">Invoice From:</p>
                                <address>
                                    {{$invoice->getTenant->company_name ?? '' }}<br>
                                    {{$invoice->getTenant->address ?? '' }}<br>
                                    {{$invoice->getTenant->phone_no ?? '' }}<br>
                                    {{$invoice->getTenant->email ?? '' }}
                                </address>
                            </div>
                            <div class="col-lg-6 text-right">
                                <p class="h3">Invoice To:</p>
                                <address>
                                    {{$invoice->getContact->company_name ?? '' }}<br>
                                    {{$invoice->getContact->company_address ?? '' }}<br>
                                    {{$invoice->getContact->company_phone ?? '' }}<br>
                                    {{$invoice->getContact->company_email ?? '' }}
                                </address>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Payment Date <sup class="text-danger">*</sup> </label>
                                    <input type="date" name="payment_date" placeholder="Payment Date" class="form-control">
                                    @error('payment_date') <i class="text-danger mt-2">{{$message}}</i>@enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Reference No. <sup class="text-danger">*</sup> </label>
                                    <input type="text" name="reference_no" value="{{old('reference_no')}}" placeholder="Reference No." class="form-control">
                                    @error('reference_no') <i class="text-danger mt-2">{{$message}}</i>@enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Payment Method<sup class="text-danger">*</sup> </label>
                                    <select name="payment_method" id="payment_method" class="form-control">
                                        <option selected disabled>--Select payment method--</option>
                                        <option value="1">Cash</option>
                                        <option value="2">Bank Transfer</option>
                                        <option value="3">Cheque</option>
                                    </select>
                                    @error('payment_method') <i class="text-danger mt-2">{{$message}}</i>@enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Bank<sup class="text-danger">*</sup> </label>
                                    <select name="bank" id="bank" class="form-control select2-show-search">
                                        <option selected disabled>--Select bank--</option>
                                        @foreach($banks as $bank)
                                        <option value="{{$bank->id}}">{{$bank->account_no ?? ''}} - {{$bank->account_name ?? '' }} ({{$bank->bank}})</option>
                                        @endforeach
                                    </select>
                                    @error('bank') <i class="text-danger mt-2">{{$message}}</i>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive push">
                            <table class="table table-bordered table-hover mb-0 text-nowrap">
                                <tbody><tr class=" ">
                                    <th class="text-center"></th>
                                    <th>Item</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-right">Unit Price</th>
                                    <th class="text-right">Sub Total</th>
                                </tr>
                                @php $serial = 1; @endphp
                                @foreach($invoice->getInvoiceItems as $item)
                                    <tr>
                                        <td class="text-center">{{$serial++}}</td>
                                        <td>
                                            <p class="font-w600 mb-1">{{$item->getService->item_name ?? '' }}</p>
                                        </td>
                                        <td class="text-center">{{$item->quantity ?? '' }}</td>
                                        <td class="text-right number-font1">{{$item->unit_cost ?? '' }}</td>
                                        <td class="text-right number-font1">{{number_format($item->quantity * $item->unit_cost,2)}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" class="font-weight-bold text-uppercase text-right">Total</td>
                                    <td class="font-weight-bold text-right h4 number-font1">{{'₦'. number_format($invoice->getInvoiceItems->sum('total'),2) }}</td>
                                </tr>
                                @if($invoice->paid_amount > 0)
                                <tr>
                                    <td colspan="4" class="font-weight-bold text-uppercase text-right">Paid</td>
                                    <td class="font-weight-bold text-right h4 number-font1">{{'₦'. number_format($invoice->paid_amount,2) }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td colspan="4" class="font-weight-bold text-uppercase text-right">Balance</td>
                                    <td class="font-weight-bold text-right h4 number-font1">{{'₦'.number_format(($invoice->total) - ($invoice->paid_amount) ,2)}}</td>
                                </tr>
                                <tr class="">
                                    <td colspan="4"></td>
                                    <td>
                                        @if(($invoice->total) - ($invoice->paid_amount) <= 0)
                                            <p class="text-center text-danger">Payment completed</p>
                                        @else
                                            <div class="form-group">
                                                <label for="">Amount<sup class="text-danger">*</sup> </label>
                                                <input type="number" step="0.01" name="amount" id="amount" placeholder="Enter Amount" class="form-control">
                                                @error('amount')<i class="text-danger">{{$message}}</i>@enderror
                                                <input type="hidden" name="invoice" value="{{$invoice->id}}">
                                                <input type="hidden" id="hidden-balance" value="{{$invoice->total - $invoice->paid_amount }}">
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{route('manage-invoices')}}" class="btn btn-primary mb-1" ><i class="ti-back-left"></i> Back</a>
                        <button type="submit" class="btn btn-success mb-1" ><i class="ti-check"></i> Make Payment</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('extra-scripts')
    <script src="/assets/plugins/select2/select2.full.min.js"></script>
    <script src="/assets/js/select2.js"></script>
    <script>
        $(document).ready(function(){
            $('#amount').on('blur', function(e){
                var balance = $('#hidden-balance').val();
                var amount = $(this).val();
                if(parseFloat(amount) > parseFloat(balance)){
                    alert("The amount you entered is more than balance amount.");
                    $(this).val('');
                }
            });
        });

    </script>
@endsection
