@extends('member.layouts')
@section('extra-css')
     <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
     <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">

    <link rel="stylesheet" type="text/css" href="/dist/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/ion.rangeSlider.skinFlat.css">
    <link rel="stylesheet" type="text/css" href="/dist/js/plugin/magnific/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="/dist/js/plugin/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/dist/js/plugin/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/style.css">
@endsection
@section('body-section')

<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <!-- <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h5 class="content-header-title float-left pr-1 mb-0">Report</h5>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb p-0 mb-0">
                                <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active">Report
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

<div class="content-body">
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body card-dashboard">

                        	<div class="row">

                        		<div class="col-md-4">

<div class="impl_carparts_inner">
    <div class="impl_buy_old_car">
        <div class="slider slider-for">
            <div><img src="/dist/images/product/old_car.png" alt=""></div>
            <div><img src="/dist/images/product/old_car1.png" alt=""></div>
            <div><img src="/dist/images/product/old_car2.png" alt=""></div>
            <div><img src="/dist/images/product/old_car3.png" alt=""></div>
        </div>
        <div class="slider slider-nav">
            <div>
                <div class="impl_thumb_ovrly"><img src="/dist/images/product/old_car_thumb1.jpg" alt=""></div>
            </div>
            <div>
                <div class="impl_thumb_ovrly"><img src="/dist/images/product/old_car_thumb2.jpg" alt=""></div>
            </div>
            <div>
                <div class="impl_thumb_ovrly"><img src="/dist/images/product/old_car_thumb3.jpg" alt=""></div>
            </div>
            <div>
                <div class="impl_thumb_ovrly"><img src="/dist/images/product/old_car_thumb4.jpg" alt=""></div>
            </div>
        </div>
    </div>
</div>
                                			
                        		</div>

                        		<div class="col-md-4">
                        			
                        		</div>

                        		<div class="col-md-4">
                        			
                        		</div>


                        	</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

    </div>
</div>

@endsection
@section('extra-js')
    <script src="/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
                    <!-- BEGIN: Page Vendor JS-->
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <!-- END: Page Vendor JS-->
    <script src="/app-assets/js/scripts/datatables/datatable.js"></script>

    <script src="/app-assets/js/scripts/forms/select/form-select2.js"></script>
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>

    <script type="text/javascript" src="/dist/js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="/dist/js/plugin/magnific/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="/dist/js/plugin/slick/slick.min.js"></script>
    <script type="text/javascript" src="/dist/js/custom.js"></script>

<script type="text/javascript">

$('.find-vehicles').addClass('active');
$('.find-vehicle').addClass('active');

</script>
@endsection