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
                            <h5 class="content-header-title float-left pr-1 mb-0">Bidding</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="/member/dashboard"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Winning Cars
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
            <div class="col-12">
                <div class="card">
        <div class="card-content">
            <div class="card-body card-dashboard">
                <!-- <p class="card-text">In this Table Show All type of Salon Information, Booking Details and Payment Details.</p> -->
                                        
        <div class="table-responsive">
               
            <table class="table zero-configuration">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Auction Title</th> 
                    <th>Lot Number</th>  
                    <th>Amount</th>
                    <th>Paid</th>
                    <th>Balance</th>
                    <th>Appointment</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                   @php $x=1 @endphp
                   @foreach ($order as $row)
                   <tr>
                    <td>{{$x}}</td>
                    <td>{{$row->auction}}</td>
                    <td>{{$row->vehicle_id}}</td>
                    <td>{{$row->amount}} AED</td>
                    <td>{{$row->paid}} AED</td>
                    <td>{{$row->balance}} AED</td>
                    <td>{{$row->appointment_date}} {{$row->appointment_time}}</td>
                    <td>
            <div class="dropdown">
                <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-125px, 19px, 0px); top: 0px; left: 0px; will-change: transform;">
                  @if($row->status == 0)
                  <a onclick="updateTime({{$row->id}})" class="dropdown-item" href="#"><i class="fa fa-business-time"></i> Update Time</a>
                  @endif
                </div>
            </div>
                   </td>
                   </tr>
                  @php $x++ @endphp
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Auction Title</th> 
                    <th>Lot Number</th>  
                    <th>Amount</th>
                    <th>Paid</th>
                    <th>Balance</th>
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
</div>


<!-- Bootstrap Modal -->
<div class="modal fade" id="popup_modal" tabindex="-1" role="dialog" aria-labelledby="popup_modal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-grey-dark-5">
                <h6 class="modal-title" id="modal-title">Add New</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" id="id">

                <div class="form-group row">
		            <label class="col-md-3 label-control">Appointment Date</label>
		            <div class="col-md-9">
		              <input type="date" id="appointment_date" class="form-control" name="appointment_date">
		            </div>
	          	</div>

	          	<div class="form-group row">
		            <label class="col-md-3 label-control">Appointment Time</label>
		            <div class="col-md-9">
                      <input type="text" id="appointment_time" class="form-control" name="appointment_time">
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

var action_type;
$('#add_new').click(function(){
    $('#popup_modal').modal('show');
    $("#form")[0].reset();
    action_type = 1;
    $('#saveButton').text('Save');
    $('#modal-title').text('Add Withdrawal');
});

function Save(){
  var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/member/update-appointment',
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
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
            toastr.error(obj[0]);
      });
    }
    });
}

function updateTime(id){
  $.ajax({
    url : '/member/get-appointment/'+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
        $('#modal-title').text('Update Time');
        $('#save').text('Save Change');
        $('input[name=appointment_date]').val(data.appointment_date);
        $('input[name=appointment_time]').val(data.appointment_time);
        $('input[name=id]').val(id);
        $('#popup_modal').modal('show');
    }
  });
}

// function Delete(id){
//     var r = confirm("Are you sure");
//     if (r == true) {
//       $.ajax({
//         url : '/member/withdrawal-delete/'+id,
//         type: "GET",
//         dataType: "JSON",
//         success: function(data)
//         {
//           toastr.success(data, 'Successfully Delete');
//           $('.zero-configuration').load(location.href+' .zero-configuration');
//         }
//       });
//     } 
// }

</script>
@endsection