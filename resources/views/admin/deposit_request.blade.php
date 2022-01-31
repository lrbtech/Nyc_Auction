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
                            <h5 class="content-header-title float-left pr-1 mb-0">Deposit</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Deposit Request
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
        <div class="card-content">
            <div class="card-body card-dashboard">
                <!-- <p class="card-text">In this Table Show All type of Salon Information, Booking Details and Payment Details.</p> -->
                                        
            <div class="table-responsive">
               
                <table class="table zero-configuration">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Member</th> 
		                    <th>Deposit</th> 
		                    <th>Slip</th>  
		                    <th>Date & Time</th>
		                    <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $x=1 @endphp
                   @foreach ($deposit as $row)
                   <tr>
                    <td>{{$x}}</td>
                    <td>
                    	@foreach($member as $member1)
                    	@if($member1->id == $row->member_id)
                    	{{$member1->name}}
                    	@endif
                    	@endforeach
                    </td>
                    <td>{{$row->deposit}} AED</td>
                    <td><img style="max-height:100px;height:100px;" src="{{asset('upload_image/').'/'.$row->image}}"></td>
                    <td>{{$row->created_at}}</td>
                    <td>
                    	@if($row->status == 0)
                    	Pending
                    	@elseif($row->status == 1)
                    	Approved
                        @elseif($row->status == 2)
                        Denied
                    	@endif
                    </td>
                   
                            
                <td><div class="dropdown">
                <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                </span>
                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-125px, 19px, 0px); top: 0px; left: 0px; will-change: transform;">
                  <a onclick="updateDeposit({{$row->id}},1)" class="dropdown-item" href="#">Approved</a>
                  <a onclick="updateDeposit({{$row->id}},2)" class="dropdown-item" href="#">Denied</a>
                </div>
              </div></td>
                            </tr>

                  @php $x++ @endphp
                  @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
			                    <th>Member</th> 
			                    <th>Deposit</th> 
			                    <th>Slip</th>  
			                    <th>Date & Time</th>
			                    <th>Status</th>
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
$('.deposit-request').addClass('active');

function updateDeposit(id,id1){
    var r = confirm("Are you sure");
    if (r == true) {
      $.ajax({
        url : '/admin/update-deposit-request/'+id+'/'+id1,
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