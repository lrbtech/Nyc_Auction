 @section('css')
      <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/editors/tinymce/tinymce.min.css">
      <link type="text/css" rel="stylesheet" href="/image-uploader/image-uploader.min.css">
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
                            <h5 class="content-header-title float-left pr-1 mb-0">Vehicle</h5>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb p-0 mb-0">
                                    <li class="breadcrumb-item"><a href="/dashboard"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active">Add Vehicle
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
        
        				<form action="#" id="form" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="" name="id" id="id">
              <div class="card-content collpase show">
                <div class="card-body">
                    <div class="form-body">
                     
                      <div class="form-group row">
                        <div class="col-md-6">
                          <label class="label-control">Choose Brand</label>
                          <select onclick="changeBrand()" name="brand_id" id="brand_id" class="form-control select2">
                          <option value="">SELECT</option>
                          @foreach($brand as $brand1)
                          <option value="{{$brand1->id}}">{{$brand1->name}}</option>
                          @endforeach
                          </select>

                          <br>

                          <label class="label-control">Choose Model</label>
                          <select name="car_id" id="car_id" class="form-control select2">
                          <option value="">SELECT</option>
                          @foreach($car as $car1)
                          <option value="{{$car1->id}}">{{$car1->name}}</option>
                          @endforeach
                          </select>

                        </div>

                        <div class="col-md-6">
                          <img id="blah" src="https://msupply.net/app-assets/images/product-image.png" alt="your image" class="single-product text-center" />
                    <input type='file' id="imgInp" name="imgInp" style="display: none;"/>
                    <button type="button" id="single-product" class="btn btn-info block single-pro"><i class="la la-plus"></i> Set Vehicle image</button>
                        </div>

                      </div>

                      <div class="form-group row">

                        <div class="col-md-4">
                          <label class="label-control">Vehicle Model</label>
                          <input type="text" class="form-control" placeholder="Vehicle Model" name="vehicle_model" id="vehicle_model">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Vehicle Status</label>
                          <select class="form-control" name="vehicle_status" id="vehicle_status">
                            <option value="">SELECT</option>
                            <option value="New">New</option>
                            <option value="Old">Old</option>
                          </select>
                        </div>

                        <!-- <div class="col-md-4">
                          <label class="label-control">Colour</label>
                          <input type="text" class="form-control" placeholder="Colour" name="colour" id="colour">
                        </div> -->

                        <div class="col-md-4">
                          <label class="label-control">Vehicle Type</label>
                          <select name="vehicle_type" id="vehicle_type" class="form-control">
                          <option value="">SELECT</option>
                          @foreach($vehicle_type as $vehicle_type1)
                          <option value="{{$vehicle_type1->id}}">{{$vehicle_type1->name}}</option>
                          @endforeach
                          </select>
                        </div>

                      </div>
                      <div class="form-group row">
                        
                        <div class="col-md-4">
                          <label class="label-control">Starting Bid Value</label>
                          <input type="text" class="form-control" placeholder="Starting Bid Value" name="price" id="price">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Minimum Bid Value</label>
                          <input type="text" class="form-control" placeholder="Minimum Bid Value" name="minimum_bid_value" id="minimum_bid_value">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Year</label>
                          <select name="year" id="year" class="form-control">
                            <option value="">SELECT</option>
                            <?php
                            $d = date('Y');
                            for ($x = 1980; $x <= $d; $x++) {
                            ?>
                            <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                            <?php } ?>
                          </select>
                        </div>

                      </div>

                      <div class="form-group row">
                        
                        <div class="col-md-4">
                          <label class="label-control">Primary Damage</label>
                          <select name="primary_damage" id="primary_damage" class="form-control">
                          <option value="">SELECT</option>
                          @foreach($damage as $damage1)
                          <option value="{{$damage1->id}}">{{$damage1->damage}}</option>
                          @endforeach
                          </select>
                        </div>
                        
                        <div class="col-md-4">
                          <label class="label-control">Secondary Damage</label>
                          <select name="secondary_damage" id="secondary_damage" class="form-control">
                          <option value="">SELECT</option>
                          @foreach($damage as $damage1)
                          <option value="{{$damage1->id}}">{{$damage1->damage}}</option>
                          @endforeach
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Document Type</label>
                          <input type="text" class="form-control" placeholder="Document Type" name="document_type" id="document_type">
                        </div>

                      </div>


                      <div class="form-group row">

                        

                        <div class="col-md-4">
                          <label class="label-control">Exterior Color</label>
                          <input type="text" class="form-control" placeholder="Exterior Color" name="exterior_color" id="exterior_color">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Interior Color</label>
                          <input type="text" class="form-control" placeholder="Interior Color" name="interior_color" id="interior_color">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Odometer</label>
                          <input type="text" class="form-control" placeholder="Odometer" name="odometer" id="odometer">
                        </div>
                        
                      </div>

                      <div class="form-group row">

                        <div class="col-md-4">
                          <label class="label-control">Engine Type</label>
                          <input type="text" class="form-control" placeholder="Engine Type" name="engine_type" id="engine_type">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Highlights</label>
                          <input type="text" class="form-control" placeholder="Highlights" name="highlights" id="highlights">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Transmission</label>
                          <input type="text" class="form-control" placeholder="Transmission" name="transmission" id="transmission">
                        </div>
                       
                      </div>

                      <div class="form-group row">

                        <div class="col-md-4">
                          <label class="label-control">Cylinders</label>
                          <input type="text" class="form-control" placeholder="Cylinders" name="cylinders" id="cylinders">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Fuel</label>
                          <input type="text" class="form-control" placeholder="Fuel" name="fuel" id="fuel">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Drive</label>
                          <input type="text" class="form-control" placeholder="Drive" name="drive" id="drive">
                        </div>

                      </div>


                      <div class="form-group row">
                        <div class="col-md-4">
                          <label class="label-control">VIN</label>
                          <input type="text" class="form-control" placeholder="VIN" name="vin" id="vin">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Keys</label>
                          <input type="text" class="form-control" placeholder="Keys" name="keys" id="keys">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Body Style</label>
                          <select name="body_style" id="body_style" class="form-control">
                          <option value="">SELECT</option>
                          <option value="Hatchback">Hatchback</option>
                          <option value="Sedan">Sedan</option>
                          <option value="MPV">MPV</option>
                          <option value="SUV">SUV</option>
                          <option value="Couple">Couple</option>
                          <option value="Convertible">Convertible</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">

                        <div class="col-md-4">
                          <label class="label-control">Location</label>
                          <input type="text" class="form-control" placeholder="Location" name="location" id="location">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Is Enable Future Vehicles</label>
                          <select name="is_enable_future_vehicles" id="is_enable_future_vehicles" class="form-control">
                            <option value="">SELECT</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Is Visible Website</label>
                          <select name="is_visible_website" id="is_visible_website" class="form-control">
                            <option value="">SELECT</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                          </select>
                        </div>

                      </div>

                      <h4 class="form-section"><i class="la la-eye"></i> Description</h4>
                      <div class="form-group row">
                   <div class="col-md-12">
                   <textarea id="description" rows="2" class="form-control tinymce" name="description"></textarea>
               </div>
                 </div>

             <div class="form-group row">  
                  <div class="col-12">

       <label class="active">Photos</label>
           <div class="input-images-1" style="padding-top: .5rem;"></div>

                  </div>
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
  $('.vehicle').addClass('active');


function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}


$("#imgInp").change(function() {
  readURL(this);
});

$("#single-product").click(function () {
  $("#imgInp").trigger('click');
});

$('.input-images-1').imageUploader();


function changeBrand(){
  var id = $("#brand_id").val();
  $.ajax({
    url : '/admin/get-brand-car/'+id,
    type: "GET",
    success: function(data)
    {
        $('#car_id').html(data);
    }
  });
}

function Save(){
    var formData = new FormData($('#form')[0]);
    var description = tinyMCE.get('description').getContent();
    formData.append('description', description);
    $.ajax({
        url : '/admin/save-vehicle',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
          $("#form")[0].reset();
          toastr.success(data, 'Successfully Save');
          window.location = "/admin/view-vehicles";
        },error: function (data) {
          var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
            toastr.error(obj[0]);
          });
        }
    });
}

</script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript">
    var dropdownselect2 = $(".select2");
    dropdownselect2.select2();
</script>
@endsection