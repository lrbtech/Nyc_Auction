@extends('member.layouts')
 @section('extra-css')
     <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
 @endsection
@section('body-section')
<div class="app-content content">
 <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1 mb-0">My Account</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Document Upload
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<div class="content-body">
    <section id="basic-datatable">
    <div class="row">
                    <div class="col-sm">
                        <form id="form" action="/member/update-document" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{$user->id}}" name="id" id="id">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label>Upload Image</label>
                                <input class="form-control" id="upload_image" name="upload_image" type="file">
                                <input value="{{$user->upload_image}}" name="upload_image1" type="hidden">
                                <label>Supported File (jpg,jpeg,png)</label>
                                <label class="alert-danger"><?php echo $errors->first('upload_image'); ?></label>
                                @if($user->upload_image != "")
                                <br><br><br><center><a target="_blank" href="{{ asset("/uploads/$user->upload_image")}}"><img src="http://skymoons.in/user.png" width="100px" height="100px"></a></center>
                                @endif
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Upload Passport</label>
                                <input class="form-control" id="upload_passport" name="upload_passport" type="file">
                                <input value="{{$user->upload_passport}}" name="upload_passport1" type="hidden">
                                <label>Supported File (jpg,jpeg,png,pdf)</label>
                                <label class="alert-danger"><?php echo $errors->first('upload_passport'); ?></label>
                                @if($user->upload_passport != "")
                                <br><br><br><center><a target="_blank" href="{{ asset("/uploads/$user->upload_passport")}}"><img src="http://skymoons.in/pdf.png" width="100px" height="100px"></a></center>
                                @endif
                            </div>
                            <div class="col-md-4 form-group">
                                <label>Upload Emirate Id</label>
                                <input class="form-control" id="upload_emirate_id" name="upload_emirate_id" type="file">
                                <input value="{{$user->upload_emirate_id}}" name="upload_emirate_id1" type="hidden">
                                <label>Supported File (jpg,jpeg,png,pdf)</label>
                                <label class="alert-danger"><?php echo $errors->first('upload_emirate_id'); ?></label>
                                @if($user->upload_emirate_id != "")
                                <br><br><br><center><a target="_blank" href="{{ asset("/uploads/$user->upload_emirate_id")}}"><img src="http://skymoons.in/pdf.png" width="100px" height="100px"></a></center>
                                @endif
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

 

@endsection
@section('extra-js')
    <script src="/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <!-- END: Page Vendor JS-->
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <!-- END: Page Vendor JS-->
    <script src="/app-assets/js/scripts/datatables/datatable.js"></script>
<script type="text/javascript">
$('.deposit').addClass('active');


</script>
@endsection