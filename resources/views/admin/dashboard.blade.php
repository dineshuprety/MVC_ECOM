@extends('admin.layout.base')
@section('title', 'Dashboard')


@section('content')

<div class="container-fluid">
    <div class="row">
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bg-white">
                                    <span class="mini-stat-icon"><i class="ti-shopping-cart"></i></span>
                                    <div class="mini-stat-info text-right text-light">
                                        <span class="counter text-white">15852</span> Total Earnings
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bg-success">
                                    <span class="mini-stat-icon"><i class="ti-user"></i></span>
                                    <div class="mini-stat-info text-right text-light">
                                        <span class="counter text-white">956</span> Pending Projects
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bg-orange">
                                    <span class="mini-stat-icon"><i class="ti-shopping-cart-full"></i></span>
                                    <div class="mini-stat-info text-right text-light">
                                        <span class="counter text-white">5210</span> New Users
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="mini-stat clearfix bg-info">
                                    <span class="mini-stat-icon"><i class="ti-stats-up"></i></span>
                                    <div class="mini-stat-info text-right text-light">
                                        <span class="counter text-white">20544</span> New Projects
                                    </div>
                                </div>
                            </div>
                        </div>
</div>
 <!-- container -->

@endsection