@section('css')
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/pickadate/pickadate.css">
  <link rel="stylesheet" type="text/css" href="/app-assets/vendors/css/pickers/daterange/daterangepicker.css">
  <meta name="csrf-token" content="{{csrf_token()}}">
@endsection
@extends('admin.layouts')
@section('body-section')
<div class="content-overlay"></div>

<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h5 class="content-header-title float-left pr-1 mb-0" onclick="onTimesUp()">Auction</h5>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb p-0 mb-0">
                            <li class="breadcrumb-item"><a href="/admin/auction"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" onclick="pusher_calling('0')">Auction Monitoring
                            </li>
                        </ol>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    
    <div  id="view-auction" class="content-body">
                    
    </div>
    
</div>



@endsection
@section('js')
<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>

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

 <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script type="text/javascript">
 window.timerOut=null;
window.timerInterval = null;
$('.auction').addClass('active');
   Pusher.logToConsole = true;
    // var channel_name = $('#channel_name').val();
        var pusher = new Pusher('21f77edf77b168e9187d', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('<?php echo $auction->channel_name; ?>');
    channel.bind('my-event', function(data) {
      //   console.log('event'+data.message.bid_type)
      
      if(data.message.bid_type == 'start'){
        pusher_calling('bonus')
      }else if(data.message.bid_type =='bonus'){
        pusher_calling('no-bid')
      }else if(data.message.bid_type =='no-bid'){
        pusher_calling('bonus')
      }

    });

var auction_id = '<?php echo $id; ?>';
var vehicle_price;
viewAuction(auction_id,false);
function viewAuction(auction_id,pushing)
{
    //alert(auction_id);
    $.ajax({
    url : '/admin/get-live-monitoring/'+auction_id,
    type: "GET",
    success: function(data)
    {
      // console.log(data)
      if(pushing == true){
        $('#view-auction').html(data.html);
        vehicle_price = data.vehicle_price;
      }else{
        $('#view-auction').html(data.html);
        vehicle_price = data.vehicle_price;
        call_time(); 

      }
    }
  });
}


function call_time(){
// if( status == 0 ){
  var start_date = $('#current_date').val();
  var start_time = $('#current_time').val();
  var end_date = $('#starting_date').val();
  var end_time = $('#starting_time').val();

// Set the date we're counting down to
var countDownDate = new Date(end_date+' '+end_time).getTime();
var countDownStartDate = new Date(start_date+' '+start_time).getTime();
// console.log(end_date+' '+end_time)
// Update the count down every 1 second
var x = setInterval(function() {
  // Get today's date and time
  var uaeTime = new Date().toLocaleString("en-US", {timeZone: "Asia/Dubai"});
  var now = (new Date(uaeTime)).getTime();
  console.log('UAE time: '+ (new Date(uaeTime)).getTime());

// var indiaTime = new Date().toLocaleString("en-US", {timeZone: "Asia/Kolkata"});
// console.log('India time: '+ (new Date(indiaTime)).getTime())
  
var dist = countDownStartDate - now;
// console.log(dist)
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
 
    
  // If the count down is over, write some text 
    
  if (distance < 0) {
  
    clearInterval(x);
    // $('#registerForm').addClass('displayhide');
    // $('#register-expire').removeClass('displayhide');
    document.getElementById("time_runner").innerHTML = "Auction Running Don't Close";
    startBid();
  }else{
     document.getElementById("time_runner").innerHTML = "Starts in "+hours + " h "
  + minutes + "m " + seconds + "s ";
  console.log(minutes);
    if(dist > 0){
      TIME_LIMIT = distance;
    $('#registerForm').addClass('displayhide');
    $('#register-pre').removeClass('displayhide');
    var days1 = Math.floor(dist / (1000 * 60 * 60 * 24));
    var hours1 = Math.floor((dist % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes1 = Math.floor((dist % (1000 * 60 * 60)) / (1000 * 60));
    var seconds1 = Math.floor((dist % (1000 * 60)) / 1000);
    // Output the result in an element with id="demo"
    document.getElementById("time_runner").innerHTML = days1 + " Day " + hours1 + "h "
    + minutes1 + "m " + seconds1 + "s ";
    }else{
      $('#registerForm').removeClass('displayhide');
      $('#register-pre').addClass('displayhide');
    }
  }
  // if()
}, 1000);
//}

}

function startBid(){
     $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
var channel_name = $('#channel_name').val();
    var token = $("#token").val();
    var formData = { _token: token, channel_name: channel_name, vehicle_price: vehicle_price};
    $.ajax({
        url : '/admin/start-bid',
        type: "POST",
        data: formData,
        //contentType: false,
        //processData: false,
        dataType: "JSON",
        success: function(data)
        {             
           pusher_calling('bonus');
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
            toastr.error(obj[0]);
            });
        }
    });
}
var TIME_LIMIT =10;


// function pusher_calling(bids_type){
//    timerOut =null;
//    timerOut = setTimeout(() => {
//        if(bids_type =='bonus'){
//          bonusTime();
//        }else if(bids_type == 'no-bid'){
//         noBid();
//        }
//        else if(bids_type == 'next'){
//           nextBid();
//        }
//   }, 10000);
// }
var timerInterval = null;
function onTimesUp() {
  clearInterval(timerInterval);
  timerInterval = null;
  console.log('cal timesup');
}

function pusher_calling(bids_type) {
  let timePassed = 0;
  onTimesUp();
  timerInterval = setInterval(() => {
    timePassed = timePassed += 1;
    timeLeft = TIME_LIMIT - timePassed;
    console.log(bids_type+'bids_type  '+timeLeft);
    if (timeLeft <= 0) {
        if(bids_type =='bonus'){
         bonusTime();
       }else if(bids_type == 'no-bid'){
        noBid();
       }
       else if(bids_type == 'next'){
          nextBid();
       }
     console.log('timeLeft'+timeLeft);
     // console.log(types+' -- '+timeLeft);
      // clearInterval(timerInterval);
      onTimesUp();
    }
  }, 1000);
}


function noBid(){
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var auction_id = $("#auction_id").val();
    var vehicle_id = $("#vehicle_id").val();
    var token = $("#token").val();
    var formData = { _token: token, auction_id: auction_id, vehicle_id: vehicle_id};
    alert(auction_id);
    alert(vehicle_id);
    alert(token);
    $.ajax({
        url : '/admin/update-vehicle-status',
        type: "POST",
        data: formData,
        //contentType: false,
        //processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            //toastr.success('Sold');
            viewAuction(auction_id,true);
            //clearTimeout(timerOut);
            pusher_calling('bonus');
            //nextBid();
           // pusher_calling('bid');
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
            toastr.error(obj[0]);
            });
        }
    });
}

function nextBid(){
 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   var auction_id = $("#auction_id").val();
  var channel_name = $('#channel_name').val();
    $.ajax({
        url : '/admin/next-bid',
        type: "POST",
        data: {channel_name:channel_name,auction_id:auction_id},
        // contentType: false,
        // processData: false,
        dataType: "JSON",
        success: function(data)
        { 
          //clearTimeout(timerOut);
          pusher_calling('bonus');
            // toastr.success('United Arab Emirates',data);
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
            toastr.error(obj[0]);
            });
        }
    });
}

function bonusTime(){
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   var data="admin";
   var bidding_type ="bonus";
  var channel_name = $('#channel_name').val();
  var price = vehicle_price;
    $.ajax({
        url : '/bonus-time',
        type: "POST",
        data: {user:data,bidding_type:bidding_type,channel_name:channel_name,vehicle_price:price},
        // contentType: false,
        // processData: false,
        dataType: "JSON",
        success: function(data)
        {   
          //clearTimeout(timerOut);
              pusher_calling('no-bid')
                console.log(data)
            // toastr.success('United Arab Emirates',data);
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
            toastr.error(obj[0]);
            });
        }
    });

    }



    function printTable() {
        var divToPrint=document.getElementById("table-marketing-campaigns");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }
</script>


  

@endsection