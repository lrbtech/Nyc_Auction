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
                            <h5 class="content-header-title float-left pr-1 mb-0">Vehicle</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">View Vehicle
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
    @if(count($errors) > 0)
    <div class="alert alert-danger">
     Upload Validation Error<br><br>
     <ul>
      @foreach($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
     </ul>
    </div>
   @endif

   @if($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
   @endif
        <!-- <form method="POST" enctype="multipart/form-data" action="/admin/import-excel">
        {{ csrf_field() }}
        <div class="form-group">
         <table class="table">
          <tr>
           <td width="40%" align="right"><label>Select File for Upload</label></td>
           <td width="30">
            <input type="file" name="select_file" />
           </td>
           <td width="30%" align="left">
            <input type="submit" name="upload" class="btn btn-primary" value="Upload">
           </td>
          </tr>
         </table>
        </div>
       </form> -->

        <button id="open_model" style="width: 200px;" type="button" class="btn btn-primary add-task-btn btn-block my-1">
          <i class="bx bx-plus"></i>
          <span>Add Vehicle</span>
        </button>
    </div>
        <div class="card-content">
            <div class="card-body card-dashboard">
                <!-- <p class="card-text">In this Table Show All type of Salon Information, Booking Details and Payment Details.</p> -->
                                        
            <div class="table-responsive">
               
                <table class="table zero-configuration">
                    <thead>
                  <tr>
                    <th>Lot.No</th>
                    <th>Image</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Vehicle Type</th>
                    <th>Price</th>
                    <th>Year</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                @php ($x = 0) @endphp
                @foreach($vehicle as $row)
                @php $x++ @endphp
                  <tr>
                    <td>#{{$row->id}}</td>
                    <td><img style="max-height:50px;height:50px;" src="{{asset('vehicle_image/').'/'.$row->image}}"></td>
                    <td>
                    @foreach($brand as $brand1)
                    @if($brand1->id == $row->brand_id)
                    {{$brand1->name}}
                    @endif
                    @endforeach
                    </td>
                    <td>
                    @foreach($car as $car1)
                    @if($car1->id == $row->car_id)
                    {{$car1->name}}
                    @endif
                    @endforeach
                    </td>
                   
                    <td>
                    @foreach($vehicle_type as $vehicle_type1)
                    @if($vehicle_type1->id == $row->vehicle_type)
                    {{$vehicle_type1->name}}
                    @endif
                    @endforeach
                    </td>
                    <td>{{$row->price}}</td>
                    <td>{{$row->year}}</td>
                    <td><div class="dropdown">
                        <span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                        </span>
                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-125px, 19px, 0px); top: 0px; left: 0px; will-change: transform;">
                          <a href="/admin/edit-vehicle/{{$row->id}}" class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                          <a onclick="Delete({{$row->id}})" class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach                  
                </tbody>
                <tfoot>
                  <tr>
                    <th>Lot.No</th>
                    <th>Image</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Vehicle Type</th>
                    <th>Price</th>
                    <th>Year</th>
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
$('.vehicle').addClass('active');
</script>
<script>

$('#open_model').click(function(){
  window.location.href="/admin/add-vehicle";
})
   
   
function Delete(id){
  var r = confirm("Are you sure");
  if (r == true) {
  $.ajax({
    url : '/admin/vehicle-delete/'+id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      toastr.success('Vehicle Delete Successfully', 'Successfully Delete');
      $('.zero-configuration').load(location.href+' .zero-configuration');
    }
  });
  }
}
   
</script>
@endsection