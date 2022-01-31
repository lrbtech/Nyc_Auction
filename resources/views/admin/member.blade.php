 @section('css')
     <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
 @endsection
 @extends('admin.layouts')
@section('body-section')
 <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1 mb-0">Member List</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Member
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
           
                <!-- Zero configuration table -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
        <!-- new task button -->
        <button id="add_new" style="width: 200px;" type="button" class="btn btn-primary add-task-btn btn-block my-1">
          <i class="bx bx-plus"></i>
          <span>New Member</span>
        </button>
        </div>
        <div class="card-content">
            <div class="card-body card-dashboard">
                <!-- <p class="card-text">In this Table Show All type of Salon Information, Booking Details and Payment Details.</p> -->
                
                <div class="table-responsive">
                   
                    <table class="table zero-configuration">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($member as $key => $row)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{$row->company_name}}</td>
                                <td>{{$row->email}}</td>
                                <td>{{$row->phone_number}}</td>

                                <td><div class="dropdown">
                                    <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                                    </span>
                                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-125px, 19px, 0px); top: 0px; left: 0px; will-change: transform;">
                                      <a onclick="Edit({{$row->id}})" class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                                      <a onclick="Delete({{$row->id}})" class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                    </div>
                                  </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Company Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>


                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                
            </div>
            
        </div>


 
<!-- Bootstrap Modal -->
<div class="modal fade" id="popup_modal" tabindex="-1" role="dialog" aria-labelledby="popup_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-grey-dark-5">
                <h6 class="modal-title text-white" id="modal-title">Add New</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Busisness Type</label>
                        <select id="busisness_type" name="busisness_type" class="form-control">
                            <option value="">SELECT</option>
                            <option value="1">Company Name</option>
                            <option value="2">Individual</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input autocomplete="off" type="text" id="name" name="name" class="form-control">
                    </div>
                </div>
                <div class="row company-view">
                    <div class="form-group col-md-12">
                        <label>Company Name</label>
                        <input type="text" id="company_name" name="company_name" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Email</label>
                        <input autocomplete="off" type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Address</label>
                        <textarea id="address" name="address" class="form-control"></textarea>
                    </div>

                </div>
                
                    
                <div class="row">
                	<div class="form-group col-md-6">
                        <label>Country</label>
                        <input type="text" id="country" name="country" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>State / Province</label>
                        <input type="text" id="state" name="state" class="form-control">
                    </div>
                </div>

                <div class="row">
                	<div class="form-group col-md-6">
                        <label>City</label>
                        <input type="text" id="city" name="city" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Zip / Postal Code</label>
                        <input type="text" id="postal_code" name="postal_code" class="form-control">
                    </div>
                </div>

                <div class="row">
                	<div class="form-group col-md-6">
                        <label>Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" class="form-control">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Phone Extension</label>
                        <input type="text" id="phone_extension" name="phone_extension" class="form-control">
                    </div>
                </div>

                <div class="row">
                	<div class="form-group col-md-6">
                        <label>I'm Most Intrested In</label>
                        <select name="most_intrested" id="most_intrested" class="form-control">
                          	<option value="">SELECT</option>
                          	@foreach($car as $car1)
                          	<option value="{{$car1->id}}">{{$car1->name}}</option>
                          	@endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>I Buy Vehicles For</label>
                        <input type="text" id="buy_vehicles_for" name="buy_vehicles_for" class="form-control">
                    </div>
                </div>

                    <div class="form-group">
                        <button onclick="Save()" id="saveButton" class="btn btn-primary btn-block mr-10" type="button">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /Bootstrap Modal -->
@endsection
@section('js')
    <script src="/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
                    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="../../../app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <!-- END: Page Vendor JS-->
    <script src="/app-assets/js/scripts/datatables/datatable.js"></script>
<script type="text/javascript">
$('.member').addClass('active');

var action_type;
$('#add_new').click(function(){
    $('#popup_modal').modal('show');
    $("#form")[0].reset();
    action_type = 1;
    $('#saveButton').text('Save');
    $('#modal-title').text('Add Member');
});

$(".company-view").hide();
$('#busisness_type').change(function(){
    var busisness_type = $('#busisness_type').val();
    if(busisness_type == '2'){
        $(".company-view").hide();
    }
    else{
        $(".company-view").show();
    }
});

function Save(){
  $('#saveButton').prop('disabled', true);
  var formData = new FormData($('#form')[0]);
  if(action_type == 1){
    $.ajax({
        url : '/admin/save-member',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            $("#form")[0].reset();
            $('#popup_modal').modal('hide');
            $('.zero-configuration').load(location.href+' .zero-configuration');
            toastr.success(data, 'Successfully Save');
            $('#saveButton').prop('disabled', false);
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
            toastr.error(obj[0]);
            $('#saveButton').prop('disabled', false);
      });
    }
    });
  }else{
    $.ajax({
      url : '/admin/update-member',
      type: "POST",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "JSON",
      success: function(data)
      {
        console.log(data);
          $("#form")[0].reset();
           $('#popup_modal').modal('hide');
           $('.zero-configuration').load(location.href+' .zero-configuration');
           toastr.success(data, 'Successfully Update');
      },error: function (data) {
        var errorData = data.responseJSON.errors;
        $.each(errorData, function(i, obj) {
          toastr.error(obj[0]);
        });
      }
    });
  }
}

function Edit(id){
  $.ajax({
    url : '/admin/member/'+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      $('#modal-title').text('Update Member');
      $('#save').text('Save Change');
      $('select[name=busisness_type]').val(data.busisness_type);
    if(data.busisness_type == '2'){
        $(".company-view").hide();
    }
    else{
        $(".company-view").show();
    }
      $('input[name=name]').val(data.name);
      $('input[name=phone_number]').val(data.phone_number);
      $('input[name=phone_extension]').val(data.phone_extension);
      $('input[name=email]').val(data.email);
      $('input[name=company_name]').val(data.company_name);
      $('textarea[name=address]').val(data.address);
      $('input[name=city]').val(data.city);
      $('input[name=state]').val(data.state);
      $('input[name=country]').val(data.country);
      $('input[name=postal_code]').val(data.postal_code);
      $('select[name=most_intrested]').val(data.most_intrested);
      $('input[name=buy_vehicles_for]').val(data.buy_vehicles_for);
      $('input[name=id]').val(id);
      $('#popup_modal').modal('show');
      action_type = 2;
    }
  });
}

function Delete(id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/admin/member-delete/'+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success(data, 'Successfully Delete');
          $('.zero-configuration').load(location.href+' .zero-configuration');
        }
      });
    } 
}

</script>
@endsection