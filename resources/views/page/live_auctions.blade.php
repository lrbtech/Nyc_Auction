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
    <meta name="csrf-token" content="{{csrf_token()}}">
    <style>
        .impl_fea_car_data {
    padding: 5px 12px;
    border: 1px solid #545454;
    text-align: center;
    transition: all 0.4s ease-in-out;
    -webkit-transition: all 0.4s ease-in-out;
    -moz-transition: all 0.4s ease-in-out;
    -ms-transition: all 0.4s ease-in-out;
    -o-transition: all 0.4s ease-in-out;
}
.impl_fea_car_data ul li {
    list-style: none;
    width: 100%;
    display: inline-block;
    margin-bottom: 2px;
    position: relative;
    font-size: 12px;
}
.impl_fea_car_data h2 {
    font-size: 14px;
    font-weight: 500;
    padding-bottom: 2px;
    text-align: center;
}
.impl_fea_car_data ul {
    padding: 0px;
    margin: 0px;
    display: inline-block;
    text-align: center;
    padding-bottom: 5px;
}
.impl_fea_car_data ul li span.impl_fea_name {
    width: 50%;
    float: right;
    text-align: left;
    padding-left: 25px;
    text-transform: capitalize;
    font-family: serif;
}
.impl_btn {
    display: inline-block;
    height: 40px;
    line-height: 40px;
    color: #ffffff;
    font-size: 14px;
    font-weight: 600;
    border-radius: 0px;
    padding: 0 10px;
    min-width: 120px;
    outline: none;
    cursor: pointer;
    text-align: center;
    text-transform: uppercase;
    background-color: transparent;
    border: none;
    position: relative;
    z-index: 1;
}
.base-timer {
  position: relative;
  width: 300px;
  height: 300px;
}

.base-timer__svg {
  transform: scaleX(-1);
}

.base-timer__circle {
  fill: none;
  stroke: none;
}

.base-timer__path-elapsed {
  stroke-width: 7px;
  stroke: grey;
}

.base-timer__path-remaining {
  stroke-width: 7px;
  stroke-linecap: round;
  transform: rotate(90deg);
  transform-origin: center;
  transition: 1s linear all;
  fill-rule: nonzero;
  stroke: currentColor;
}

.base-timer__path-remaining.green {
  color: rgb(65, 184, 131);
}

.base-timer__path-remaining.orange {
  color: orange;
}

.base-timer__path-remaining.red {
  color: red;
}

.base-timer__label {
  position: absolute;
  width: 300px;
  height: 300px;
  top: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 35px;
  font-family: sans-serif;
  text-align: center;
}
 #check_timer{
          padding-bottom: 40px;
        }
        .timeFalse{
          display: none
        }
    </style>
    


<!-- <script>
// Set the date we're counting down to
var countDownDate = <?php //echo $current_time; ?>
//var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();
//alert(countDownDate);
// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Output the result in an element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // If the count down is over, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>    -->  

@endsection
@section('content')

<div id="view-auction">
      <center><img src="https://thumbs.gfycat.com/ZealousFineHochstettersfrog-size_restricted.gif"></center>
</div>



<style type="text/css">
          .product_view .modal-dialog{max-width: 800px; width: 100%;}
        .pre-cost{text-decoration: line-through; color: #a5a5a5;}
        .space-ten{padding: 10px 0;}
       

</style>
<div class="modal fade product_view" id="popup_modal">
    <div class="modal-dialog">
        <div class="modal-content" id="view-details">
            
        </div>
    </div>
</div>
@endsection
@section('extra-js')
 <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script type="text/javascript" src="/dist/js/jquery.js"></script>
    <script type="text/javascript" src="/dist/js/popper.js"></script>
    <script type="text/javascript" src="/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/dist/js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="/dist/js/plugin/magnific/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="/dist/js/plugin/slick/slick.min.js"></script>
    <script type="text/javascript" src="/dist/js/custom.js"></script>
 

  <script>

    var public_ipv = '"{{$_SERVER['REMOTE_ADDR']}}"';
    var circleBid='';
    var timerOut=null;
    var bid_amount;
    var public_ip;
    var bid_id;
    var vehicle_id;
    var min_bid;
    var total_bid;
    var bidding_place=0;
    var bidding_type;
    var body_data;
    var after_bid=0;
    // function pusher_call(){
      Pusher.logToConsole = true;
    // var channel_name = $('#channel_name').val();
        var pusher = new Pusher('3c1ff3765990f4a5c9f1', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('<?php echo $auction->channel_name; ?>');

    //var members_count = channel.members.count;
    //alert(members_count);

    channel.bind('my-event', function(data) {
      bidding_type = data.message.bid_type;
      console.log('event'+data.message.bid_type)
      var auction_id = $("#auction_id").val();
      if(after_bid ==1){
        $('#view-auction').html(body_data);
        after_bid=0;
      }
      //if check admin then goto
      if(data.message.user =='admin'){
        console.log('bidding_type'+data.message.bid_type)
          if(data.message.bid_type =='bonus'){
            console.log('bonus value'+data.message.bid_amount);
            bidding_type='bonus';
            clearInterval(timerInterval);
            bidding_timer(10,'bonus');
            $('#base-timer-label').html('Bonus Time'+'<br>'+data.message.bid_amount);
            //TIME_LIMIT = 10;
            // console.log(data.message.bid_amount)
          }else if(data.message.bid_type =='no-bid'){
            bidding_type='no-bid';
            //clearInterval(timerInterval);
            viewAuction(auction_id,true);
            //$('#base-timer-label').html(circleBid + '<br> Bid!'); 
          }
          else if(data.message.bid_type =='start'){
            bidding_type='start';
            clearInterval(timerInterval);
            bidding_timer(10,'start');
            $('#base-timer-label').html(circleBid + '<br> Bid!'); 
          }
          // else if(data.message.bid_type =='next'){
          //   if(auction_id ==null){
          //     viewAuction(data.message.auction_id);
          //   }else{
          //     viewAuction(auction_id);
          //   }
          // }

          //user access
      }else{
           clearInterval(timerInterval);
           bidding_timer(10,'bid');
        // console.log(data.message.bid_amount)
        //  alert(JSON.stringify(data));
        // clearInterval(timerInterval);
        // bidding_timer();

        // bidding_type='bid';
         bid_amount = JSON.stringify(data.message.bid_amount);
         public_ip = JSON.stringify(data.message.public_ip);
         bid_id = JSON.stringify(data.message.bid_id);
         vehicle_id = JSON.stringify(data.message.vehicle_id);
         min_bid = parseInt($('#min_bid_value').val());
         total_bid = parseInt(bid_amount) + parseInt(min_bid);
        // clearTimeout(timerOut);
    //if(public_ipv == public_ip){
    //timerOut = setTimeout(() => {
         
    //    updateVehicleStatus(bid_id,vehicle_id);
    // }, 10000);
    //     }
        $('#bid_amount').val(total_bid);
        if(data.message.bid_type =='bonus'){
         $('#base-timer-label').html('Bonus Time'+'<br>'+bid_amount);
        }else{
         $('#base-timer-label').html(bid_amount+ '<br> Bid!');

        }
      }
    });
    
    //  }

    function bonusTime(){
      $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
   var formData = { _token: token, auction_id: auction_id, vehicle_id: vehicle_id, bid_amount: bid_amount,channel_name:channel_name,bidding_type:bidding_type };

    $.ajax({
        url : '/bonus-time',
        type: "POST",
        data: formData,
        //contentType: false,
        //processData: false,
        dataType: "JSON",
        success: function(data)
        {       
                      
            // toastr.success('United Arab Emirates',data);
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
            toastr.error(obj[0]);
            });
        }
    });

    }


function viewDetails(id)
{
    $.ajax({
    url : '/live-vehicle-quick-view/'+id,
    type: "GET",
    success: function(data)
    {
      bidding_type = 'live_bid';
        $('#view-details').html(data);
        $('#popup_modal').modal('show');
    }
  });
}

function bidding_timer(TIME_LIMITS,types) {
  var TIME_LIMIT = TIME_LIMITS;
  let timeLeft = TIME_LIMIT;

const FULL_DASH_ARRAY = 283;
const WARNING_THRESHOLD = 10;
const ALERT_THRESHOLD = 5;

const COLOR_CODES = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD
  }
};


let timePassed = 0;

window.timerInterval = null;

let remainingPathColor = COLOR_CODES.info.color;

document.getElementById("app").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
 
  <span id="base-timer-label" class="base-timer__label"> 0 
  </span>
</div>
`;
console.log('TIME_LIMIT'+TIME_LIMIT)
startTimer();

function onTimesUp() {
  clearInterval(timerInterval);
  timerInterval = null;
  console.log('cal timesup');
}
// var onTimesUp2=null;
// window.onTimesUp2 = correctData() => {
// console.log('Okay')
// }

function startTimer() {
  timerInterval = setInterval(() => {
    timePassed = timePassed += 1;
    timeLeft = TIME_LIMIT - timePassed;
    // document.getElementById("base-timer-label").innerHTML = formatTime(
    //   timeLeft
    // );
    setCircleDasharray();
    setRemainingPathColor(timeLeft);
    
    if (timeLeft <= 0) {
     // console.log('timeLeft'+timeLeft);
      console.log(types+' -- '+timeLeft);
      // clearInterval(timerInterval);
      onTimesUp();
    }
  }, 1000);
}

// function formatTime(time) {
//   const minutes = Math.floor(time / 60);
//   let seconds = time % 60;

//   if (seconds < 10) {
//     seconds = `0${seconds}`;
//   }

//   return `${minutes}:${seconds}`;
// }

function setRemainingPathColor(timeLeft) {
  const { alert, warning, info } = COLOR_CODES;
  if (timeLeft <= alert.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(warning.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(alert.color);
  } else if (timeLeft <= warning.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(info.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(warning.color);
  }
}

function calculateTimeFraction() {
  const rawTimeFraction = timeLeft / TIME_LIMIT;
  return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
  const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY
  ).toFixed(0)} 283`;
  document
    .getElementById("base-timer-path-remaining")
    .setAttribute("stroke-dasharray", circleDasharray);
}

}
</script>

  

<script type="text/javascript">

var auction_id = '<?php echo $id; ?>';

viewAuction(auction_id,false);
function viewAuction(auction_id,pushing)
{
    //alert(auction_id);
    $.ajax({
    url : '/get-live-auctions/'+auction_id,
    type: "GET",
    success: function(data)
    {
       
        circleBid = parseInt(data.vehicle_price);
        if(pushing ==true){
          $('#view-auction').html(data.html);
         
        clearInterval(timerInterval);
        bidding_timer(10,'next');
         $('#base-timer-label').html(circleBid + '<br> Bid!');  
      }else{
        if(data.time_status ==1){
           body_data=data.html;
          after_bid=1;
        }else{
          $('#view-auction').html(data.html);
          call_time(); 
        }

      }
      
        
    }
  });
}

function SaveBid(){
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    var auction_id = $("#auction_id").val();
    var vehicle_id = $("#vehicle_id").val();
    var bid_amount = $("#bid_amount").val();
    var token = $("#token").val();
    var channel_name = '<?php echo $auction->channel_name; ?>';
    var formData = { _token: token, auction_id: auction_id, vehicle_id: vehicle_id, bid_amount: bid_amount,channel_name:channel_name,bidding_type:bidding_type };

    $.ajax({
        url : '/save-bid-value',
        type: "POST",
        data: formData,
        //contentType: false,
        //processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            toastr.success('United Arab Emirates',data);
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
            toastr.error(obj[0]);
            });
        }
    });
}

function updateVehicleStatus(bid_id,vehicle_id){
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    var auction_id = $("#auction_id").val();
    var vehicle_id = $("#vehicle_id").val();
    var bid_id = bid_id;
    var token = $("#token").val();
    var formData = { _token: token, auction_id: auction_id, vehicle_id: vehicle_id, bid_id: bid_id };

    $.ajax({
        url : '/update-vehicle-status',
        type: "POST",
        data: formData,
        //contentType: false,
        //processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            toastr.success('Sold');
            viewAuction(auction_id);
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
  var totalValue = parseInt(min_bid + circleBid);
  bid_amount = parseInt(bid_amount + min_bid);
  $('#bid_amount').val(bid_amount);
}
function btnMinus(){
   var min_bid = parseInt($('#min_bid_value').val());
  var bid_amount = parseInt($('#bid_amount').val());
  var totalValue = parseInt(min_bid + circleBid);
  if(totalValue < bid_amount){
    bid_amount = parseInt(bid_amount - min_bid);
    $('#bid_amount').val(bid_amount);
  }
}

function call_time(){
// if( status == 0 ){
  var start_date = $('#current_date').val();
  var start_time = $('#current_time').val();
  var end_date = $('#starting_date').val();
  var end_time = $('#starting_time').val();

  console.log(start_date);
  console.log(start_time);
  console.log(end_date);
  console.log(end_time);

// Set the date we're counting down to
var countDownDate = new Date(end_date+' '+end_time).getTime();
var countDownStartDate = new Date(start_date+' '+start_time).getTime();
// console.log(end_date+' '+end_time)
// Update the count down every 1 second


var x = setInterval(function() {
  // Get today's date and time
  //var now = new Date().getTime('GMT+04');
  // var now = new Date().getTime("en-UK",{timeZone:'Europe/London'});

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
    $('#registerForm').addClass('displayhide');
    $('#register-expire').removeClass('displayhide');
    $('#check_timer').removeClass('timeFalse');
   
    //bidding_timer(10);
     $('#base-timer-label').html('Get Ready'); 
    //$('#base-timer-label').html(circleBid + '<br> Bid!'); 
    //document.getElementById("time_runner").innerHTML = "EXPIRED";
  }else{
     document.getElementById("base-timer-label").innerHTML = "Bidding <br>"+"Starts in"+"<br>"+hours + " h "
  + minutes + "m " + seconds + "s ";
  $('#check_timer').addClass('timeFalse');
    if(dist > 0){
      TIME_LIMIT = distance;
    $('#registerForm').addClass('displayhide');
    $('#register-pre').removeClass('displayhide');
    var days1 = Math.floor(dist / (1000 * 60 * 60 * 24));
    var hours1 = Math.floor((dist % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes1 = Math.floor((dist % (1000 * 60 * 60)) / (1000 * 60));
    var seconds1 = Math.floor((dist % (1000 * 60)) / 1000);
    // Output the result in an element with id="demo"
    document.getElementById("time_runner1").innerHTML = days1 + " Day " + hours1 + "h "
    + minutes1 + "m " + seconds1 + "s ";
    }else{
      $('#registerForm').removeClass('displayhide');
      $('#register-pre').addClass('displayhide');
    }
  }
  // if()
}, 1000);
//}
bidding_timer(0,'counter');
}

 
</script>
@endsection