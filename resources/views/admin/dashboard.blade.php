@extends('admin.layouts')
@section('css')
<link rel="stylesheet" type="text/css" href="/app-assets/css/core/menu/menu-types/vertical-menu.min.css">
<link rel="stylesheet" type="text/css" href="/app-assets/css/pages/dashboard-ecommerce.min.css">
<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/extensions/swiper.min.css">
@endsection
@section('body-section')


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
                                    <h3 class="greeting-text">Congratulations John!</h3>
                                    <p class="mb-0">Best seller of the month</p>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between align-items-end">
                                            <div class="dashboard-content-left">
                                                <h1 class="text-primary font-large-2 text-bold-500">$89k</h1>
                                                <p>You have done 57.6% more sales today.</p>
                                                <button type="button" class="btn btn-primary glow">View Sales</button>
                                            </div>
                                            <div class="dashboard-content-right">
                                                <img src="/app-assets/images/icon/cup.png" height="220" width="220" class="img-fluid" alt="Dashboard Ecommerce" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Multi Radial Chart Starts -->
                        <div class="col-xl-4 col-md-6 col-12 dashboard-visit">
                            <div class="card">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Visits of 2019</h4>
                                    <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div id="multi-radial-chart"></div>
                                        <ul class="list-inline d-flex justify-content-around mb-0">
                                            <li> <span class="bullet bullet-xs bullet-primary mr-50"></span>Target</li>
                                            <li> <span class="bullet bullet-xs bullet-danger mr-50"></span>Mart</li>
                                            <li> <span class="bullet bullet-xs bullet-warning mr-50"></span>Ebay</li>
                                        </ul>
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
                                                        <div class="text-muted line-ellipsis">New Products</div>
                                                        <h3 class="mb-0">1.2k</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12 dashboard-users-danger">
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
                                        </div>
                                        <div class="col-xl-12 col-lg-6 col-12 dashboard-revenue-growth">
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
                                        </div>
                                    </div>
                                </div>
                                <!-- Revenue Growth Chart Starts -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Earning Swiper Starts -->
                        <div class="col-xl-4 col-md-6 col-12 dashboard-earning-swiper" id="widget-earnings">
                            <div class="card">
                                <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                                    <h5 class="card-title"><i class="bx bx-dollar font-medium-5 align-middle"></i> <span class="align-middle">Earnings</span></h5>
                                    <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                                </div>
                                <div class="card-content">
                                    <div class="card-body py-1 px-0">
                                        <!-- earnings swiper starts -->
                                        <div class="widget-earnings-swiper swiper-container p-1">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide rounded swiper-shadow py-50 px-2 d-flex align-items-center" id="repo-design">
                                                    <i class="bx bx-pyramid mr-1 font-weight-normal font-medium-4"></i>
                                                    <div class="swiper-text">
                                                        <div class="swiper-heading">Repo Design</div>
                                                        <small class="d-block">Gitlab</small>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide rounded swiper-shadow py-50 px-2 d-flex align-items-center" id="laravel-temp">
                                                    <i class="bx bx-sitemap mr-50 font-large-1"></i>
                                                    <div class="swiper-text">
                                                        <div class="swiper-heading">Designer</div>
                                                        <small class="d-block">Women Clothes</small>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide rounded swiper-shadow py-50 px-2 d-flex align-items-center" id="admin-theme">
                                                    <i class="bx bx-check-shield mr-50 font-large-1"></i>
                                                    <div class="swiper-text">
                                                        <div class="swiper-heading">Best Sellers</div>
                                                        <small class="d-block">Clothing</small>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide rounded swiper-shadow py-50 px-2 d-flex align-items-center" id="ux-devloper">
                                                    <i class="bx bx-devices mr-50 font-large-1"></i>
                                                    <div class="swiper-text">
                                                        <div class="swiper-heading">Admin Template</div>
                                                        <small class="d-block">Global Network</small>
                                                    </div>
                                                </div>
                                                <div class="swiper-slide rounded swiper-shadow py-50 px-2 d-flex align-items-center" id="marketing-guide">
                                                    <i class="bx bx-book-bookmark mr-50 font-large-1"></i>
                                                    <div class="swiper-text">
                                                        <div class="swiper-heading">Marketing Guide</div>
                                                        <small class="d-block">Books</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- earnings swiper ends -->
                                    </div>
                                </div>
                                <div class="main-wrapper-content">
                                    <div class="wrapper-content" data-earnings="repo-design">
                                        <div class="widget-earnings-scroll table-responsive">
                                            <table class="table table-borderless widget-earnings-width mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-10.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Jerry Lter</h6>
                                                                    <span class="font-small-2">Designer</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-info progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="80" aria-valuemax="100" style="width:33%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-warning">- $280</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Pauly uez</h6>
                                                                    <span class="font-small-2">Devloper</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-success progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="80" aria-valuemax="100" style="width:10%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-success">+ $853</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Lary Masey</h6>
                                                                    <span class="font-small-2">Marketing</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-primary progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80" aria-valuemax="100" style="width:15%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-primary">+ $125</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-12.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Lula Taylor</h6>
                                                                    <span class="font-small-2">Degigner</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-danger progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80" aria-valuemax="100" style="width:35%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-danger">- $310</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="wrapper-content" data-earnings="laravel-temp">
                                        <div class="widget-earnings-scroll table-responsive">
                                            <table class="table table-borderless widget-earnings-width mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-9.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Jesus Lter</h6>
                                                                    <span class="font-small-2">Designer</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-info progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="28" aria-valuemin="80" aria-valuemax="100" style="width:28%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-info">- $280</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-10.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Pauly Dez</h6>
                                                                    <span class="font-small-2">Devloper</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-success progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="80" aria-valuemax="100" style="width:90%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-success">+ $83</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Lary Masey</h6>
                                                                    <span class="font-small-2">Marketing</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-primary progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80" aria-valuemax="100" style="width:15%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-primary">+ $125</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-12.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Lula Taylor</h6>
                                                                    <span class="font-small-2">Devloper</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-danger progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80" aria-valuemax="100" style="width:35%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-danger">- $310</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="wrapper-content" data-earnings="admin-theme">
                                        <div class="widget-earnings-scroll table-responsive">
                                            <table class="table table-borderless widget-earnings-width mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-25.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Mera Lter</h6>
                                                                    <span class="font-small-2">Designer</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-info progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="52" aria-valuemin="80" aria-valuemax="100" style="width:52%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-info">- $180</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-15.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Pauly Dez</h6>
                                                                    <span class="font-small-2">Devloper</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-success progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="80" aria-valuemax="100" style="width:90%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-success">+ $553</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">jini mara</h6>
                                                                    <span class="font-small-2">Marketing</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-primary progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80" aria-valuemax="100" style="width:15%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-primary">+ $125</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-12.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Lula Taylor</h6>
                                                                    <span class="font-small-2">UX</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-danger progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80" aria-valuemax="100" style="width:35%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-danger">- $150</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="wrapper-content" data-earnings="ux-devloper">
                                        <div class="widget-earnings-scroll table-responsive">
                                            <table class="table table-borderless widget-earnings-width mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-16.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Drako Lter</h6>
                                                                    <span class="font-small-2">Designer</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-info progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="38" aria-valuemin="80" aria-valuemax="100" style="width:38%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-danger">- $280</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-1.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Pauly Dez</h6>
                                                                    <span class="font-small-2">Devloper</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-success progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="80" aria-valuemax="100" style="width:90%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-success">+ $853</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Lary Masey</h6>
                                                                    <span class="font-small-2">Marketing</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-primary progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80" aria-valuemax="100" style="width:15%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-primary">+ $125</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-2.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Lvia Taylor</h6>
                                                                    <span class="font-small-2">Devloper</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-danger progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="80" aria-valuemax="100" style="width:75%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-danger">- $360</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="wrapper-content" data-earnings="marketing-guide">
                                        <div class="widget-earnings-scroll table-responsive">
                                            <table class="table table-borderless widget-earnings-width mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-19.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">yono Lter</h6>
                                                                    <span class="font-small-2">Designer</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-info progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="28" aria-valuemin="80" aria-valuemax="100" style="width:28%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-primary">- $270</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Pauly Dez</h6>
                                                                    <span class="font-small-2">Devloper</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-success progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="80" aria-valuemax="100" style="width:90%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-success">+ $853</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-12.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Lary Masey</h6>
                                                                    <span class="font-small-2">Marketing</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-primary progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80" aria-valuemax="100" style="width:15%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-primary">+ $225</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pr-75">
                                                            <div class="media align-items-center">
                                                                <a class="media-left mr-50" href="#">
                                                                    <img src="/app-assets/images/portrait/small/avatar-s-25.jpg" alt="avatar" class="rounded-circle" height="30" width="30">
                                                                </a>
                                                                <div class="media-body">
                                                                    <h6 class="media-heading mb-0">Lula Taylor</h6>
                                                                    <span class="font-small-2">Devloper</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="px-0 w-25">
                                                            <div class="progress progress-bar-danger progress-sm mb-0">
                                                                <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80" aria-valuemax="100" style="width:35%;"></div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center"><span class="badge badge-light-danger">- $350</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Dashboard Ecommerce ends -->

            </div>
        </div>
<script type="text/javascript">

$('.dashboard').addClass('active');

</script>
@endsection

@section('js')

 <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="/app-assets/vendors/js/extensions/swiper.min.js"></script>
    <!-- END: Page Vendor JS-->


    <!-- BEGIN: Page JS-->
    <script src="/app-assets/js/scripts/pages/dashboard-ecommerce.min.js"></script>
@endsection