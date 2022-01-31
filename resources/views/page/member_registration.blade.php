@extends('page.app')
@section('extra-css')
	<link rel="stylesheet" type="text/css" href="dist/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/style.css">
@endsection
@section('content')
    <!------ Breadcrumbs Start ------>
    <div class="impl_bread_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Member</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Member Registration</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!------ Contact Wrapper Start ------>
    <div class="impl_contact_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-12 offset-lg-1">
                    <div class="">
                        <div class="col-lg-12 col-md-12">
                            <h1>Member Registration</h1>
                        </div>
                        <form id="form" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                            
                            <div class="col-lg-12 col-md-12">
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

                            </div>
                            <div class="response"></div>
                            <div class="col-lg-12 col-md-12">
                                <button onclick="Save()" id="saveButton" type="button" class="btn btn-primary">Member Registration</button>
                            </div>
                        </form>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
    
@endsection
@section('extra-js')

<!--Main js file Style-->
    <script type="text/javascript" src="dist/js/jquery.js"></script>
    <script type="text/javascript" src="dist/js/popper.js"></script>
    <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist/js/contact_form.js"></script>
    <script type="text/javascript" src="dist/js/custom.js"></script>
    <!--Main js file End-->
    
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
    $.ajax({
        url : '/save-member-registration',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            $("#form")[0].reset();
            $('#popup_modal').modal('hide');
            //$('.zero-configuration').load(location.href+' .zero-configuration');
            toastr.success(data, 'Successfully Save');
            $('#saveButton').prop('disabled', false);
            window.location.href="/thanks-page";
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
            toastr.error(obj[0]);
            $('#saveButton').prop('disabled', false);
      		});
    	}
    });
}

</script>	

@endsection