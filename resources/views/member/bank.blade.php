@extends('member.layouts')
@section('extra-css')
     <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
     <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
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
            <section class="hk-sec-wrapper">
                <h5 class="hk-sec-title">Update Profile</h5>
                <div class="row">
                    <div class="col-sm">
                    	<form id="form" action="/member/update-settings" method="POST" enctype="multipart/form-data">
                    	{{ csrf_field() }}
                    	<input type="hidden" name="id" id="id" value="{{$member->id}}" >


                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Busisness Type</label>
                        <select id="busisness_type" name="busisness_type" class="form-control">
                            <option value="">SELECT</option>
                            <option <?php if ($member->busisness_type == '1') { echo ' selected="selected"'; } ?> value="1">Company Name</option>
                            <option <?php if ($member->busisness_type == '2') { echo ' selected="selected"'; } ?> value="2">Individual</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input value="{{$member->name}}" autocomplete="off" type="text" id="name" name="name" class="form-control">
                    </div>
                </div>
                <div class="row company-view">
                    <div class="form-group col-md-12">
                        <label>Company Name</label>
                        <input value="{{$member->company_name}}" type="text" id="company_name" name="company_name" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input value="{{$member->email}}" autocomplete="off" type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Address</label>
                        <textarea id="address" name="address" class="form-control">{{$member->address}}</textarea>
                    </div>

                </div>
                
                    
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Country</label>
                        <input value="{{$member->country}}" type="text" id="country" name="country" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>State / Province</label>
                        <input value="{{$member->state}}" type="text" id="state" name="state" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>City</label>
                        <input value="{{$member->city}}" type="text" id="city" name="city" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Zip / Postal Code</label>
                        <input value="{{$member->postal_code}}" type="text" id="postal_code" name="postal_code" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Phone Number</label>
                        <input value="{{$member->phone_number}}" type="text" id="phone_number" name="phone_number" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Phone Extension</label>
                        <input value="{{$member->phone_extension}}" type="text" id="phone_extension" name="phone_extension" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>I'm Most Intrested In</label>
                        <select name="most_intrested" id="most_intrested" class="form-control">
                            <option value="">SELECT</option>
                            @foreach($car as $car1)
                            <option <?php if ($member->most_intrested == $car1->id) { echo ' selected="selected"'; } ?> value="{{$car1->id}}">{{$car1->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>I Buy Vehicles For</label>
                        <input value="{{$member->buy_vehicles_for}}" type="text" id="buy_vehicles_for" name="buy_vehicles_for" class="form-control">
                    </div>
                </div>
                <hr>
                <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                    </div>
                </div>
            </section>
            </div>
        	</div>
        </div>
    </div>



                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- END: Content-->

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

<script type="text/javascript">

$('.my-account').addClass('active');
$('.settings').addClass('active');

</script>
@endsection