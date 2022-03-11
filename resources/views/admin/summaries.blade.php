
@extends('layouts.dashboard')
@section('content')


<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-md-3">
        <div class="card border-left-success shadow">
            <div class="card-body">
                <div class="row ">
                    <div>
                        <div class="text-xs font-weight-bold text-center ">
                            Invoices</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">
                        <a href="invoice"> <img src="images/invoice.png"  style="width:50%;height:50%" ></a>
                        </div>
                        <div class="text-center">
                        {{$invoices->count()}}
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-md-3">
        <div class="card border-left-success shadow">
            <div class="card-body">
                <div class="row ">
                    <div>
                        <div class="text-xs font-weight-bold text-center ">
                            Quotations</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">
                        <img src="images/quote.png"  style="width:50%;height:50%" >
                        </div>
                        <div class="text-center">
                        {{$quotations->count()}}
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-md-3">
        <div class="card border-left-success shadow">
            <div class="card-body">
                <div class="row ">
                    <div>
                        <div class="text-xs font-weight-bold text-center ">
                            Orders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">
                        <img src="images/order.png"  style="width:50%;height:50%" >
                        </div>
                        <div class="text-center">
                        {{$orders->count()}}
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-left-success shadow">
            <div class="card-body">
                <div class="row ">
                    <div>
                        <div class="text-xs font-weight-bold text-center ">
                            Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">
                        <img src="images/users.png"  style="width:50%;height:50%" >
                        </div>
                        <div class="text-center">
                        {{$users->count()}}
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

    

</div>

<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-md-3">
        <div class="card border-left-success shadow">
            <div class="card-body">
                <div class="row ">
                    <div>
                        <div class="text-xs font-weight-bold text-center ">
                            Compelete Payments</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 text-center">
                        <img src="images/pay.png"  style="width:50%;height:50%" >
                        </div>
                        <div class="text-center">
                        {{$payments->count()}}
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>

</div>

@endsection