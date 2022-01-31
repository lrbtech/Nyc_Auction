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
            <input type="hidden" value="{{$vehicle->id}}" name="id" id="id">
              <div class="card-content collpase show">
                <div class="card-body">
                    <div class="form-body">
                     
                      <div class="form-group row">

                        <div class="col-md-6">
                          <label class="label-control">Choose Brand</label>
                          <select onclick="changeBrand()" name="brand_id" id="brand_id" class="form-control">
                          <option value="">SELECT</option>
                          @foreach($brand as $brand1)
                          @if($brand1->id == $vehicle->brand_id)
                          <option selected value="{{$brand1->id}}">{{$brand1->name}}</option>
                          @else
                          <option value="{{$brand1->id}}">{{$brand1->name}}</option>
                          @endif
                          @endforeach
                          </select>

                          <br>

                          <label class="label-control">Choose Model</label>
                          <select name="car_id" id="car_id" class="form-control">
                          @foreach($car as $car1)
                          @if($car1->id == $vehicle->car_id)
                          <option selected value="{{$car1->id}}">{{$car1->name}}</option>
                          @else
                          <option value="{{$car1->id}}">{{$car1->name}}</option>
                          @endif
                          @endforeach
                          </select>

                        </div>

                        <div class="col-md-6">
                          @if($vehicle->image=="")
                          <img id="blah" src="https://msupply.net/app-assets/images/product-image.png" class="single-product text-center" />
                          @else
                          <img id="blah" src="/vehicle_image/{{$vehicle->image}}" class="single-product text-center" />
                          @endif
                    <input type='file' id="imgInp" name="imgInp" style="display: none;"/>
                    <input value="{{$vehicle->image}}" type='hidden' id="imgInp1" name="imgInp1"/>
                    <button type="button" id="single-product" class="btn btn-info block single-pro"><i class="la la-plus"></i> Set Vehicle image</button>
                        </div>

                      </div>

                      <div class="form-group row">

                        <div class="col-md-4">
                          <label class="label-control">Vehicle Model</label>
                          <input value="{{$vehicle->vehicle_model}}" type="text" class="form-control" placeholder="Vehicle Model" name="vehicle_model" id="vehicle_model">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Vehicle Status</label>
                          <select class="form-control" name="vehicle_status" id="vehicle_status">
                            <option value="">SELECT</option>
                            <option <?php echo ($vehicle->vehicle_status == 'New') ?  "selected" : "" ;  ?> value="New">New</option>
                            <option <?php echo ($vehicle->vehicle_status == 'Old') ?  "selected" : "" ;  ?> value="Old">Old</option>
                          </select>
                        </div>

                        <!-- <div class="col-md-4">
                          <label class="label-control">Colour</label>
                          <input value="{{$vehicle->colour}}" type="text" class="form-control" placeholder="Colour" name="colour" id="colour">
                        </div> -->

                        <div class="col-md-4">
                          <label class="label-control">Vehicle Type</label>
                          <select name="vehicle_type" id="vehicle_type" class="form-control">
                          <option value="">SELECT</option>
                          @foreach($vehicle_type as $vehicle_type1)
                          @if($vehicle_type1->id == $vehicle->vehicle_type)
                          <option selected value="{{$vehicle_type1->id}}">{{$vehicle_type1->name}}</option>
                          @else
                          <option value="{{$vehicle_type1->id}}">{{$vehicle_type1->name}}</option>
                          @endif
                          @endforeach
                          </select>
                        </div>

                      </div>

                      <div class="form-group row">

                        <div class="col-md-4">
                          <label class="label-control">Starting Bid Value</label>
                          <input value="{{$vehicle->price}}" type="text" class="form-control" placeholder="Price" name="price" id="price">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Minimum Bid Value</label>
                          <input value="{{$vehicle->minimum_bid_value}}" type="text" class="form-control" placeholder="Minimum Bid Value" name="minimum_bid_value" id="minimum_bid_value">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Year</label>
                          <select name="year" id="year" class="form-control">
                            <option value="">SELECT</option>
                            <?php
                            $d = date('Y');
                            for ($x = 1980; $x <= $d; $x++) {
                            ?>
                            <option <?php echo ($vehicle->year == $x) ?  "selected" : "" ;  ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
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
                          @if($damage1->id == $vehicle->primary_damage)
                          <option selected value="{{$damage1->id}}">{{$damage1->damage}}</option>
                          @else
                          <option value="{{$damage1->id}}">{{$damage1->damage}}</option>
                          @endif
                          @endforeach
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Secondary Damage</label>
                          <select name="secondary_damage" id="secondary_damage" class="form-control">
                          <option value="">SELECT</option>
                          @foreach($damage as $damage1)
                          @if($damage1->id == $vehicle->secondary_damage)
                          <option selected value="{{$damage1->id}}">{{$damage1->damage}}</option>
                          @else
                          <option value="{{$damage1->id}}">{{$damage1->damage}}</option>
                          @endif
                          @endforeach
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Document Type</label>
                          <input value="{{$vehicle->document_type}}" type="text" class="form-control" placeholder="Document Type" name="document_type" id="document_type">
                        </div>

                      </div>


                      <div class="form-group row">

                        <div class="col-md-4">
                          <label class="label-control">Exterior Color</label>
                          <input value="{{$vehicle->exterior_color}}" type="text" class="form-control" placeholder="Exterior Color" name="exterior_color" id="exterior_color">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Interior Color</label>
                          <input value="{{$vehicle->interior_color}}" type="text" class="form-control" placeholder="Interior Color" name="interior_color" id="interior_color">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Odometer</label>
                          <input value="{{$vehicle->odometer}}" type="text" class="form-control" placeholder="Odometer" name="odometer" id="odometer">
                        </div>
                        
                      </div>

                      <div class="form-group row">

                        <div class="col-md-4">
                          <label class="label-control">Engine Type</label>
                          <input value="{{$vehicle->engine_type}}" type="text" class="form-control" placeholder="Engine Type" name="engine_type" id="engine_type">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Highlights</label>
                          <input value="{{$vehicle->highlights}}" type="text" class="form-control" placeholder="Highlights" name="highlights" id="highlights">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Transmission</label>
                          <input value="{{$vehicle->transmission}}" type="text" class="form-control" placeholder="Transmission" name="transmission" id="transmission">
                        </div>
                        
                      </div>

                      <div class="form-group row">
                        
                        <div class="col-md-4">
                          <label class="label-control">Cylinders</label>
                          <input value="{{$vehicle->cylinders}}" type="text" class="form-control" placeholder="Cylinders" name="cylinders" id="cylinders">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Fuel</label>
                          <input value="{{$vehicle->fuel}}" type="text" class="form-control" placeholder="Fuel" name="fuel" id="fuel">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Drive</label>
                          <input value="{{$vehicle->drive}}" type="text" class="form-control" placeholder="Drive" name="drive" id="drive">
                        </div>

                      </div>


                      <div class="form-group row">
                        <div class="col-md-4">
                          <label class="label-control">VIN</label>
                          <input value="{{$vehicle->vin}}" type="text" class="form-control" placeholder="VIN" name="vin" id="vin">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Keys</label>
                          <input value="{{$vehicle->keys}}" type="text" class="form-control" placeholder="Keys" name="keys" id="keys">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Body Style</label>
                          <select name="body_style" id="body_style" class="form-control">
                          <option value="">SELECT</option>
                          <option <?php echo ($vehicle->body_style == 'Hatchback') ?  "selected" : "" ;  ?> value="Hatchback">Hatchback</option>
                          <option <?php echo ($vehicle->body_style == 'Sedan') ?  "selected" : "" ;  ?> value="Sedan">Sedan</option>
                          <option <?php echo ($vehicle->body_style == 'MPV') ?  "selected" : "" ;  ?> value="MPV">MPV</option>
                          <option <?php echo ($vehicle->body_style == 'SUV') ?  "selected" : "" ;  ?> value="SUV">SUV</option>
                          <option <?php echo ($vehicle->body_style == 'Couple') ?  "selected" : "" ;  ?> value="Couple">Couple</option>
                          <option <?php echo ($vehicle->body_style == 'Convertible') ?  "selected" : "" ;  ?> value="Convertible">Convertible</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row">

                        <div class="col-md-4">
                          <label class="label-control">Location</label>
                          <input value="{{$vehicle->location}}" type="text" class="form-control" placeholder="Location" name="location" id="location">
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Is Enable Future Vehicles</label>
                          <select name="is_enable_future_vehicles" id="is_enable_future_vehicles" class="form-control">
                            <option value="">SELECT</option>
                            <option <?php echo ($vehicle->is_enable_future_vehicles == '1') ?  "selected" : "" ;  ?> value="1">Yes</option>
                            <option <?php echo ($vehicle->is_enable_future_vehicles == '0') ?  "selected" : "" ;  ?> value="0">No</option>
                          </select>
                        </div>

                        <div class="col-md-4">
                          <label class="label-control">Is Visible Website</label>
                          <select name="is_visible_website" id="is_visible_website" class="form-control">
                            <option value="">SELECT</option>
                            <option <?php echo ($vehicle->is_visible_website == '1') ?  "selected" : "" ;  ?> value="1">Yes</option>
                            <option <?php echo ($vehicle->is_visible_website == '0') ?  "selected" : "" ;  ?> value="0">No</option>
                          </select>
                        </div>

                      </div>

                      <h4 class="form-section"><i class="la la-eye"></i> Description</h4>
                      <div class="form-group row">
                   		<div class="col-md-12">
	                   		<textarea id="description" rows="2" class="form-control tinymce" name="description">
	                    	<?php echo $vehicle->description; ?>
	                   		</textarea>
               		    </div>
                      </div>

	            <div class="form-group row">  
	                <div class="col-12">

	       			<label class="active">Photos</label>
	           		<div class="input-images-1" style="padding-top: .5rem;"></div>

	                </div>
	            </div>

                <div class="imageview">
                <div class="row">
                  @foreach($vehicle_image as $row)
                  <div class="form-group col-md-3">
                    <img style="width: 200px;height: 200px;" src="{{asset('vehicle_image/').'/'.$row->image}}">
                    <br><a href="javascript: void(0)" onclick="imageDelete('{{$row->id}}')">Remove</a>
                  </div>
                  @endforeach
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

function Save(){
var formData = new FormData($('#form')[0]);
    var description = tinyMCE.get('description').getContent();
    formData.append('description', description);
    $.ajax({
        url : '/admin/update-vehicle',
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

function imageDelete(id){
  var r = confirm("Are you sure");
  if (r == true) {
    $.ajax({
      url : '/admin/vehicle-image-delete/'+id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        toastr.success('Image Delete Successfully', 'Successfully Delete');
        $('.imageview').load(location.href+' .imageview');
      }
    });
  }
}


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
</script>
@endsection