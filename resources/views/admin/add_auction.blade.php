 @section('css')
      <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/tinymce/tinymce.min.css">
      <link type="text/css" rel="stylesheet" href="/image-uploader/image-uploader.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
  .select2-container--default .select2-selection--multiple {
    width: 100% !important;
  }

.single-product{
  display: block;
  width: 100%;
  height: 300px;
  background-color: white;
  border-radius: 5px;
 }
</style>
 @endsection
 @extends('admin.layouts')
@section('body-section')
 <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-12 mb-2 mt-1">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h5 class="content-header-title float-left pr-1 mb-0">Auction</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Add Auction
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
                    <div class="card-header">
        
        	<form action="#" id="form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="" name="id" id="id">
              <div class="card-content collpase show">
                <div class="card-body">

                      <div class="form-group row">

                        <div class="col-md-4">
                          <label class="label-control">Auction Title</label>
                          <input type="text" class="form-control" placeholder="Auction Title" name="auction_title" id="auction_title">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Starting Date</label>
                          <input type="date" class="form-control" placeholder="Starting Date" name="starting_date" id="starting_date">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Starting Time</label>
                          <input type="text" class="form-control" placeholder="Starting Time" name="starting_time" id="starting_time">
                        </div>

                      </div>

                      <div class="form-group row">

                        <div class="col-md-4">
                          <label class="label-control">Channel Name</label>
                          <input type="text" class="form-control" placeholder="Channel Name" name="channel_name" id="channel_name">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Minimum Percentage</label>
                          <input type="text" class="form-control" placeholder="Minimum Percentage" name="minimum_percentage" id="minimum_percentage">
                        </div>

                      </div>

                      <div class="form-group row">

                        <div class="col-md-4">
                          <label class="label-control">Enter Lot Number</label>
                          <input type="text" class="form-control" placeholder="Enter Lot Number" name="lot_number" id="lot_number">
                        </div>

                        <div class="col-md-4">
                          	<br>
                          	<button type="button" onclick="Add()" class="btn btn-primary">
                        		<i class="la la-check-square-o"></i> Add
                      		</button>
                        </div>

                      </div>

                    <div class="row">
                    	<table id="productTable" class="table">
                                <style type="text/css">
                                    .table td{
                                         padding: .0rem !important; 
                                    }
                                </style>
                            <thead class="thead-primary">
                                <tr style="text-align: center;">
                                    <th style="width: 10%;">Lot Number</th>
                                    <th style="width: 20%;">Brand</th>
                                    <th style="width: 20%">Model</th>
                                    <th style="width: 15%">Vehicle Type</th>
                                    <th style="width: 15%">Price</th>
                                    <th style="width: 15%">Year</th>
                                    <th style="width: 5%;padding: .0rem !important;">
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="productTabletbody">
                            	
                            </tbody>
                        </table>
                    </div>                   
                                               
                </div>
      		</form>

                    <div class="form-actions">
                      <button type="button" class="btn btn-warning mr-1">
                        <i class="ft-x"></i> Cancel
                      </button>
                      <button type="button" onclick="Save()" class="btn btn-primary">
                        <i class="la la-check-square-o"></i> Save
                      </button>
                    </div>


						</div>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
</div>


@endsection
@section('js')
<script src="/app-assets/vendors/js/editors/tinymce/tinymce.js" type="text/javascript"></script>
<script src="/app-assets/js/scripts/editors/editor-tinymce.js" type="text/javascript"></script>
<script src="/image-uploader/image-uploader.min.js"></script>

<script>
$('.auction').addClass('active');


function Save(){
var formData = new FormData($('#form')[0]);
$.ajax({
        url : '/admin/save-auction',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            $("#form")[0].reset();
            toastr.success(data, 'Successfully Save');
            window.location = "/admin/view-auction";
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
            toastr.error(obj[0]);
      });
    }
    });
}



function Add() {
	var tableLength = $("#productTable tbody tr").length;

	var tableRow;
	var arrayNumber;
	var count;

	if(tableLength > 0) {		
		tableRow = $("#productTable tbody tr:last").attr('id');
		arrayNumber = $("#productTable tbody tr:last").attr('class');
		count = tableRow.substring(3);	
		count = Number(count) + 1;
		arrayNumber = Number(arrayNumber) + 1;					
	} else {
		count = 1;
		arrayNumber = 0;
	}


var tr = '<tr value="'+count+'" id="row'+count+'">'+
	'<td>'+
		'<input readonly type="text" name="lot[]" id="lot'+count+'" autocomplete="off" class="form-control" />'+
	'</td>'+
  '<td>'+
    '<input readonly type="text" name="brand[]" id="brand'+count+'" autocomplete="off" class="form-control" />'+
    '<input readonly type="hidden" name="vehicle_id[]" id="vehicle_id'+count+'" />'+
  '</td>'+
	'<td>'+
		'<input readonly type="text" name="model[]" id="model'+count+'" autocomplete="off" class="form-control" readonly="true" />'+
	'</td>'+
	'<td>'+
		'<input readonly type="text" name="vehicle_type[]" id="vehicle_type'+count+'" autocomplete="off" class="form-control" readonly="true" />'+
	'</td>'+
	'<td>'+
		'<input readonly type="text" name="price[]" id="price'+count+'" autocomplete="off" class="form-control" readonly="true" />'+
	'</td>'+
	'<td>'+
		'<input readonly type="text" name="year[]" id="year'+count+'" autocomplete="off" class="form-control" readonly="true" />'+
	'</td>'+
	'<td align="center">'+
		'<button id="removeProductRowBtn'+count+'" class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow('+count+')"><i class="fa fa-minus" aria-hidden="true"></i></button>'+
	'</td>'+
'</tr>';


if(tableLength > 0) {							
	$("#productTable tbody tr:last").after(tr);
} else {				
	$("#productTable tbody").append(tr);
}		

var lot_number = $("#lot_number").val();

$.ajax({
  url : '/admin/get-auction-vehicle/'+lot_number,
  type: "GET",
  dataType: "JSON",
  success: function( data ) {
    //alert(data.status);
    $("#lot"+count).val(lot_number);
    $("#brand"+count).val(data.brand);
    $("#vehicle_id"+count).val(data.vehicle_id);
    $("#model"+count).val(data.model);
    $("#vehicle_type"+count).val(data.vehicle_type);
    $("#price"+count).val(data.price);
    $("#year"+count).val(data.year);
    if(data.status == 1){
      $("#row"+count).remove();
      alert('Lot Number is Wrong!');
    }
  },error: function (data) {
    $("#row"+count).remove();
    alert('Lot Number is Wrong!');
  }
});


} // /add row


function removeProductRow(row = null)
{
	if(confirm('Are you sure delete this row?'))
	{
		$("#row"+row).remove();
	}
}


</script>
@endsection