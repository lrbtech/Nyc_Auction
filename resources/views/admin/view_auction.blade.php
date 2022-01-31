@section('css')
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/pickadate/pickadate.css">
	<link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/daterange/daterangepicker.css">
@endsection
@extends('admin.layouts')
@section('body-section')
 <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1 mb-0">Auction List</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Auction
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
        <button id="add_new" style="width: 300px;" type="button" class="btn btn-primary add-task-btn btn-block my-1">
          <i class="bx bx-plus"></i>
          <span>New Auction</span>
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
                                <th>Title</th>
                                <th>Starting Date</th>
                                <th>Starting Time</th>
                                <th>Vehicles</th>
                                <th>Minimum Percentage</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($auction as $key => $row)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$row->auction_title}}</td>
                                <td>{{$row->starting_date}}</td>
                                <td>{{$row->starting_time}}</td>
                                <td>
                                    <?php 
                                    $x=0;
                                    foreach($auction_id as $value){
                                        if($value->auction_id == $row->id){
                                        $x++;
                                        }
                                    } 
                                    ?>
                                    {{$x}} Vehicles
                                </td>
                                <td>{{$row->minimum_percentage}} %</td>
					            <td>
						            <div class="dropdown">
						                <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
						                </span>
						                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-125px, 19px, 0px); top: 0px; left: 0px; will-change: transform;">
						                  <a class="dropdown-item" href="/admin/edit-auction/{{$row->id}}"><i class="bx bx-edit-alt mr-1"></i> edit</a>
						                  <a onclick="Delete({{$row->id}})" class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                                          @if($row->status == 0)
						                  <a class="dropdown-item" href="/admin/auction-monitoring/{{$row->id}}"><i class="bx bx-chat mr-1"></i> Monitoring</a>
                                          @else
                                          <a target="_blank" class="dropdown-item" href="/404"><i class="bx bx-chat mr-1"></i> Monitoring</a>
                                          @endif
						                </div>
						            </div>
					            </td>
                    		</tr>
                 		@endforeach
               			</tbody>
		                <tfoot>
		                    <tr>
                        		<th>#</th>
                                <th>Title</th>
                                <th>Starting Date</th>
                                <th>Starting Time</th>
                                <th>Vehicles</th>
                                <th>Minimum Percentage</th>
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
    <div class="modal-dialog " role="document">
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

                    <div class="form-group">
                        <label>Auction Title</label>
                        <input autocomplete="off" type="text" id="auction_title" name="auction_title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Starting Date</label>
                        <input autocomplete="off" type="text" id="starting_date" name="starting_date" class="form-control singledate">
                    </div>

                    <div class="form-group">
                        <label>Starting Time</label>
                        <input autocomplete="off" type="text" id="starting_time" name="starting_time" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Choose Vehicles</label>
                        <select id="vehicle_ids" name="vehicle_ids" class="select2 form-control" multiple="multiple">
                        	<option value="">SELECT</option>
                        	@foreach ($vehicle as $vehicle1)
                            <option value="{{$vehicle1->id}}">{{$vehicle1->email}}</option>
                          	@endforeach
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <button onclick="Save()" id="saveButton" class="btn btn-primary btn-block mr-10" type="button">Save</button>
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
    <script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>

	<script src="/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
	<script src="/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
	<script src="/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
	<script src="/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>
	<script src="/app-assets/vendors/js/pickers/daterange/moment.min.js"></script>
	<script src="/app-assets/vendors/js/pickers/daterange/daterangepicker.js"></script>

    <script src="/app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js"></script>
    <script src="/app-assets/js/scripts/forms/select/form-select2.js"></script>

<script type="text/javascript">
$('.auction').addClass('active');

$(".select2").select2({
    dropdownAutoWidth: true,
    width: '100%'
});

$('.singledate').daterangepicker({
  singleDatePicker: true,
  showDropdowns: true
});

var action_type;
// $('#add_new').click(function(){
//     $('#popup_modal').modal('show');
//     $("#form")[0].reset();
//     action_type = 1;
//     $('#saveButton').text('Save');
//     $('#modal-title').text('Add Auction');
// });

$('#add_new').click(function(){
  window.location.href="/admin/add-auction";
})
  

function Edit(id){
  $.ajax({
    url : '/admin/auction/'+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      $('#modal-title').text('Update Auction');
      $('#save').text('Save Change');
      $('input[name=auction_title]').val(data.auction_title);
      $('input[name=starting_time]').val(data.starting_time);
      $('input[name=starting_date]').val(data.starting_date);
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
        url : '/admin/auction-delete/'+id,
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