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
        </div>
        <div class="card-content">
            <div class="card-body card-dashboard">
                <!-- <p class="card-text">In this Table Show All type of Salon Information, Booking Details and Payment Details.</p> -->
                
                <div class="table-responsive">
                   
                    <table class="table zero-configuration">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Lot Number</th>
                                <th>Member</th>
                                <th>Bid Amount</th>
                                <th>Payment Status</th>
                                <th>Appointment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($order as $key => $row)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$row->vehicle_id}}</td>
                                <td>
                                    @foreach($user as $member)
                                    @if($row->member_id == $member->id)
                                        {{$member->name}}
                                    @endif
                                    @endforeach
                                </td>
                                <td>{{$row->amount}}</td>
                                <td>
                                @if($row->payment_status == 0)
                                Un Paid
                                @else 
                                Paid
                                @endif
                                </td>
                                <td>{{$row->appointment_date}} {{$row->appointment_time}}</td>
					            <td>
						            <div class="dropdown">
						                <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
						                </span>
						                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-125px, 19px, 0px); top: 0px; left: 0px; will-change: transform;">
                                          @if($row->payment_status == 0)
                                            <a  class="dropdown-item" href="#" onclick="ChangeStatus({{$row->id}},1)">Paid</a>                                 
                                          @else 
                                            <a  class="dropdown-item" href="#" onclick="ChangeStatus({{$row->id}},0)">Un Paid</a> 
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
                                <th>Lot Number</th>
                                <th>Member</th>
                                <th>Bid Amount</th>
                                <th>Payment Status</th>
                                <th>Appointment</th>
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
$('.auction-winners').addClass('active');

$(".select2").select2({
    dropdownAutoWidth: true,
    width: '100%'
});

$('.singledate').daterangepicker({
  singleDatePicker: true,
  showDropdowns: true
});

var action_type;

  

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

function ChangeStatus(id,id1){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/admin/update-payment-status/'+id+'/'+id1,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
          toastr.success(data, 'Successfully Update');
          $('.zero-configuration').load(location.href+' .zero-configuration');
        }
      });
    } 
}
</script>
@endsection