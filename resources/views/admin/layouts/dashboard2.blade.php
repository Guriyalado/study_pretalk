@extends('admin.layouts.admin')
@section('title')
    Dashboard
@endsection
@section('body')
<div class="dash-body">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Welcome !</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

        <div class="row column1">
            <div class="col-md-6 col-lg-3">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div>
                            <i class="fa-solid fa-cart-arrow-down yellow_color"></i>
                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">489</p>
                            <a href="{{'order'}}"><p class="head_couter">Order</p></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="full counter_section margin_bottom_30">
                    <div class="couter_icon">
                        <div>
                            <i class="fa-solid fa-file-invoice-dollar green_color"></i>

                        </div>
                    </div>
                    <div class="counter_no">
                        <div>
                            <p class="total_no">
                                @if ($mentor<10)
                                0{{$mentor}}

                                @else
                                {{$mentor}}
                                @endif
                            </p>
                            <a href="{{'mentor'}}"><p class="head_couter">Mentor</p></a>
                        </div>
                    </div>
                </div>
            </div>
           
    @endsection
