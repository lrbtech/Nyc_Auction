@extends('member.layouts')
@section('extra-css')
<link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
<link rel="stylesheet" type="text/css" href="/app-assets/css/pages/dashboard-ecommerce.min.css">
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/swiper.min.css">
@endsection
@section('body-section')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                
<!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
    <div class="row">
        <!-- Greetings Content Starts -->
        <div class="col-xl-4 col-md-6 col-12 dashboard-greetings">
            <div class="card">
                <div class="card-header">
                    <h3 class="greeting-text">Congratulations {{Auth::user()->name}}!</h3>
                    <p class="mb-0">Best seller of the month</p>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-end">
                            <img style="margin-left:50px;" src="/app-assets/images/icon/cup.png" height="220" width="220" class="img-fluid" alt="Dashboard Ecommerce" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-4 col-12 dashboard-users">
            <div class="row  ">
                <!-- Statistics Cards Starts -->
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-6 col-12 dashboard-users-success">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-success mx-auto mb-50">
                                            <i class="bx bx-briefcase-alt font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">Wallet</div>
                                        <h3 class="mb-0">{{Auth::user()->wallet}} AED</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-sm-6 col-12 dashboard-users-danger">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body py-1">
                                        <div class="badge-circle badge-circle-lg badge-circle-light-danger mx-auto mb-50">
                                            <i class="bx bx-user font-medium-5"></i>
                                        </div>
                                        <div class="text-muted line-ellipsis">New Users</div>
                                        <h3 class="mb-0">45.6k</h3>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-xl-12 col-lg-6 col-12 dashboard-revenue-growth">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center pb-0">
                                    <h4 class="card-title">Revenue Growth</h4>
                                    <div class="d-flex align-items-end justify-content-end">
                                        <span class="mr-25">$25,980</span>
                                        <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body pb-0">
                                        <div id="revenue-growth-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
                <!-- Revenue Growth Chart Starts -->
            </div>
        </div>
    </div>

    </section>



            </div>
        </div>
    </div>
@endsection
@section('extra-js')

 <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/swiper.min.js"></script>
    <script src="/app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script>
@endsection