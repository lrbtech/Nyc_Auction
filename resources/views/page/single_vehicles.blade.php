@extends('page.app')
@section('extra-css')

	<link rel="stylesheet" type="text/css" href="/dist/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/ion.rangeSlider.skinFlat.css">
    <link rel="stylesheet" type="text/css" href="/dist/js/plugin/magnific/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="/dist/js/plugin/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/dist/js/plugin/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/style.css">
@endsection
@section('content')
   <div id="view-auction"></div>
@endsection
@section('extra-js')

	<script type="text/javascript" src="/dist/js/jquery.js"></script>
    <script type="text/javascript" src="/dist/js/popper.js"></script>
    <script type="text/javascript" src="/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/dist/js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="/dist/js/plugin/magnific/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="/dist/js/plugin/slick/slick.min.js"></script>
    <script type="text/javascript" src="/dist/js/custom.js"></script>
    <script type="text/javascript">

var vehicle_id = '<?php echo $id; ?>';

viewAuction(vehicle_id);
function viewAuction(vehicle_id)
{
    //alert(vehicle_id);
    $.ajax({
    url : '/get-pre-auctions/'+vehicle_id,
    type: "GET",
    success: function(data)
    {
        $('#view-auction').html(data.html);   
    }
  });
}

function SaveBid(){
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    var vehicle_id = $("#vehicle_id").val();
    var token = $("#token").val();
    var bid_amount = $("#bid_amount").val();
    var formData = { _token: token, vehicle_id: vehicle_id, bid_amount:bid_amount };

    $.ajax({
        url : '/save-pre-bid-value',
        type: "POST",
        data: formData,
        dataType: "JSON",
        success: function(data)
        {                
            toastr.success('United Arab Emirates',data);
            viewAuction(vehicle_id);
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
            toastr.error(obj[0]);
            });
        }
    });
}


function btnPlus(){
  var min_bid = parseInt($('#min_bid_value').val());
  var bid_amount = parseInt($('#bid_amount').val());
  var vehicle_price = parseInt($('#vehicle_price').val());
  var totalValue = parseInt(min_bid + vehicle_price);
  bid_amount = parseInt(bid_amount + min_bid);
  $('#bid_amount').val(bid_amount);
}
function btnMinus(){
  var min_bid = parseInt($('#min_bid_value').val());
  var bid_amount = parseInt($('#bid_amount').val());
  var vehicle_price = parseInt($('#vehicle_price').val());
  var totalValue = parseInt(min_bid + vehicle_price);
    if(totalValue < bid_amount){
    bid_amount = parseInt(bid_amount - min_bid);
    $('#bid_amount').val(bid_amount);
    }
}

 
</script>
@endsection