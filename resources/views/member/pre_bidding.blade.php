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
                                    <li class="breadcrumb-item active">Pre Bidding
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
                    <th>Date</th> 
                    <th>Time</th>  
                    <th>Lot Number</th>
                    <th>Bid Amount</th>
                  </tr>
                </thead>
                <tbody>
                   @php $x=1 @endphp
                   @foreach ($pre_bid_value as $row)
                   <tr>
                    <td>{{$x}}</td>
                    <td>{{$row->date}}</td>
                    <td>{{$row->time}}</td>
                    <td>{{$row->vehicle_id}}</td>
                    <td>{{$row->bid_amount}} AED</td>
                   </tr>
                  @php $x++ @endphp
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Date</th> 
                    <th>Time</th>  
                    <th>Lot Number</th>
                    <th>Bid Amount</th>
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
  if(action_type == 1){
    $.ajax({
        url : '/member/save-withdrawal',
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
  // else{
  //   $.ajax({
  //     url : '/member/update-deposit',
  //     type: "POST",
  //     data: formData,
  //     contentType: false,
  //     processData: false,
  //     dataType: "JSON",
  //     success: function(data)
  //     {
  //       console.log(data);
  //         $("#form")[0].reset();
  //          $('#popup_modal').modal('hide');
  //          $('.zero-configuration').load(location.href+' .zero-configuration');
  //          toastr.success(data, 'Successfully Update');
  //     },error: function (data) {
  //       var errorData = data.responseJSON.errors;
  //       $.each(errorData, function(i, obj) {
  //         toastr.error(obj[0]);
  //       });
  //     }
  //   });
  // }
}

// function Edit(id){
//   $.ajax({
//     url : '/member/deposit/'+id,
//     type: "GET",
//     dataType: "JSON",
//     success: function(data)
//     {
//       $('#modal-title').text('Update Deposit');
//       $('#save').text('Save Change');
//       $('input[name=name]').val(data.name);
//           $('input[name=image1]').val(data.image);
//       $('input[name=id]').val(id);
//       $('#popup_modal').modal('show');
//       action_type = 2;
//     }
//   });
// }

function Delete(id){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/member/withdrawal-delete/'+id,
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

$( "#amount" ).change(function() {
	var wallet = Number($("#wallet").val());
	var amount=Number($("#amount").val());

	if(wallet >= amount)
	{
	}
	else
	{
		alert('Given Amount is higher than Wallet Amount');
		$("#amount").val('');
		$("#amount").focus();
	}
});
</script>
@endsection