function addRow() {
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
		'<input class="form-control" type="text" name="product_search[]" id="product_search'+count+'" autocomplete="off"  />'+
		'<input type="hidden" name="product_id[]" id="product_id'+count+'" autocomplete="off" class="form-control" />'+
	'</td>'+
	'<td>'+
		'<input style="text-align:right;" onchange="changeQty('+count+')" type="text" name="qty[]" id="qty'+count+'" autocomplete="off" class="form-control" />'+
	'</td>'+
	'<td>'+
		'<input style="text-align:right;" onchange="changePrice('+count+')" value="0" type="text" name="price[]" id="price'+count+'" autocomplete="off" class="form-control" />'+
	'</td>'+
	'<td>'+
		'<input style="text-align:right;" value="0" type="text" name="sub_total[]" id="sub_total'+count+'" autocomplete="off" class="form-control" readonly="true" />'+
	'</td>'+
	'<td>'+
		'<input style="text-align:right;" onchange="tableDiscountPercentage('+count+')" value="0" type="text" name="discount_percentage[]" id="discount_percentage'+count+'" autocomplete="off" class="form-control" />'+
	'</td>'+
	'<td>'+
		'<input style="text-align:right;" onchange="tableDiscountAmount('+count+')" value="0" type="text" name="discount_amount[]" id="discount_amount'+count+'" autocomplete="off" class="form-control" />'+
		'<input style="text-align:right;" value="0" type="hidden" name="after_discount[]" id="after_discount'+count+'" autocomplete="off" />'+
	'</td>'+
	'<td>'+
		'<input style="text-align:right;" value="0" type="text" name="tax_percentage[]" id="tax_percentage'+count+'" autocomplete="off" class="form-control" readonly="true" />'+
	'</td>'+
	'<td>'+
		'<input style="text-align:right;" value="0" type="text" name="tax_amount[]" id="tax_amount'+count+'" autocomplete="off" class="form-control" readonly="true" />'+
	'</td>'+
	
	'<td>'+
		'<input style="text-align: right;" value="0" type="text" name="total[]" id="total'+count+'" autocomplete="off" class="form-control" readonly="true" />'+
	'</td>'+
	'<td align="center">'+
		'<button id="removeProductRowBtn'+count+'" class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow('+count+')"><i class="glyphicon glyphicon-trash"></i></button>'+
	'</td>'+
'</tr>';


if(tableLength > 0) {							
	$("#productTable tbody tr:last").after(tr);
} else {				
	$("#productTable tbody").append(tr);
}		
$("#product_search"+count).focus();


$( "#product_search"+count ).autocomplete({
    source: function( request, response ) {
      // Fetch data
      $.ajax({
        url:"/get-product",
        dataType: "json",
        data: request, 
        success: function( data ) {
            if(data.response == 'true') 
            {
                response(data.message);
            }
        }
      });
    },
    select: function (event, ui) {
        $(this).val(ui.item.label); 
        var pro_id = ui.item.id; 
        $.ajax({
            url : '/get-product/'+pro_id,
            type: "GET",
            dataType: "JSON",
            success:function(response) 
            {
                $("#product_id"+count).val(response.id);    
                $("#price"+count).val(response.sales_price);
				$("#tax_percentage"+count).val(response.tax);
				$("#discount_percentage"+count).val(Number(response.discount));	

                var tax=$("#tax_type").val();
                var price=0;
					
				$("#qty"+count).focus();
				
				$("#qty"+count).val('');

				var sub_total = Number(response.sales_price) * 0;
					
     			sub_total = sub_total.toFixed(2);
				$("#sub_total"+count).val(sub_total);

				var discount = (sub_total/100) * Number(response.discount);
				discount = discount.toFixed(2);

				$("#discount_amount"+count).val(discount);	

				var after_discount= Number(sub_total) - Number(discount);

				$("#after_discount"+count).val(after_discount);

				if(tax=="1"){
					var tax1 = (after_discount * Number(response.tax)) / (100+ Number(response.tax));
					tax1 = tax1.toFixed(2);
					$("#tax_amount"+count).val(tax1);	
							
					var total=Number(after_discount);
					total = total.toFixed(2);
					$("#total"+count).val(total);
				}
				else if(tax=="2"){
					var tax1 = (after_discount/100) * Number(response.tax);
					tax1 = tax1.toFixed(2);
					$("#tax_amount"+count).val(tax1);	

					var total=Number(after_discount) + Number(tax1);
					total = total.toFixed(2);
					$("#total"+count).val(total);
				}
				subAmount();
            }
        });
    }       
});

} // /add row


function removeProductRow(row = null)
{
	if(confirm('Are you sure delete this row?'))
	{
	   	var tableProductLength = $("#productTable tbody tr").length;

		if(tableProductLength > '1') {
			$("#row"+row).remove();
			var previous_row = row - 1;
			var next_row = row + 1;
			$("#product_search"+previous_row).focus();		
			$("#product_search"+next_row).focus();		
		}
	}
}



function changePrice(count = null){
	var price = $("#price"+count).val();
	var qty = $("#qty"+count).val();
	var tax_percentage = $("#tax_percentage"+count).val();
	var discount_percentage = $("#discount_percentage"+count).val();

    var tax=$("#tax_type").val();

	var sub_total = Number(price) * Number(qty);
		sub_total = sub_total.toFixed(2);
	$("#sub_total"+count).val(sub_total);

	var discount = (sub_total/100) * Number(discount_percentage);
	discount = discount.toFixed(2);

	$("#discount_amount"+count).val(discount);	

	var after_discount= Number(sub_total) - Number(discount);

	$("#after_discount"+count).val(after_discount);

	if(tax=="1"){
		var tax1 = (after_discount * Number(tax_percentage)) / (100+ Number(tax_percentage));
		tax1 = tax1.toFixed(2);
		$("#tax_amount"+count).val(tax1);	
				
		var total=Number(after_discount);
		total = total.toFixed(2);
		$("#total"+count).val(total);
	}
	else if(tax=="2"){
		var tax1 = (after_discount/100) * Number(tax_percentage);
		tax1 = tax1.toFixed(2);
		$("#tax_amount"+count).val(tax1);	

		var total=Number(after_discount) + Number(tax1);
		total = total.toFixed(2);
		$("#total"+count).val(total);
	}
	subAmount();
}

function changeQty(count = null){
	var price = $("#price"+count).val();
	var qty = $("#qty"+count).val();
	var tax_percentage = $("#tax_percentage"+count).val();
	var discount_percentage = $("#discount_percentage"+count).val();

    var tax=$("#tax_type").val();

	var sub_total = Number(price) * Number(qty);
		sub_total = sub_total.toFixed(2);
	$("#sub_total"+count).val(sub_total);

	var discount = (sub_total/100) * Number(discount_percentage);
	discount = discount.toFixed(2);

	$("#discount_amount"+count).val(discount);	

	var after_discount= Number(sub_total) - Number(discount);

	$("#after_discount"+count).val(after_discount);

	if(tax=="1"){
		var tax1 = (after_discount * Number(tax_percentage)) / (100+ Number(tax_percentage));
		tax1 = tax1.toFixed(2);
		$("#tax_amount"+count).val(tax1);	
				
		var total=Number(after_discount);
		total = total.toFixed(2);
		$("#total"+count).val(total);
	}
	else if(tax=="2"){
		var tax1 = (after_discount/100) * Number(tax_percentage);
		tax1 = tax1.toFixed(2);
		$("#tax_amount"+count).val(tax1);	

		var total=Number(after_discount) + Number(tax1);
		total = total.toFixed(2);
		$("#total"+count).val(total);
	}
	subAmount();
	addRow();
}


function tableDiscountPercentage(count = null){
	var tax_percentage = $("#tax_percentage"+count).val();
	var discount_percentage = $("#discount_percentage"+count).val();
	var sub_total = $("#sub_total"+count).val();
	$("#discount_amount"+count).val(0);	

    var tax=$("#tax_type").val();

	var discount = (sub_total/100) * Number(discount_percentage);
	discount = discount.toFixed(2);

	$("#discount_amount"+count).val(discount);	

	var after_discount= Number(sub_total) - Number(discount);

	$("#after_discount"+count).val(after_discount);

	if(tax=="1"){
		var tax1 = (after_discount * Number(tax_percentage)) / (100+ Number(tax_percentage));
		tax1 = tax1.toFixed(2);
		$("#tax_amount"+count).val(tax1);	
				
		var total=Number(after_discount);
		total = total.toFixed(2);
		$("#total"+count).val(total);
	}
	else if(tax=="2"){
		var tax1 = (after_discount/100) * Number(tax_percentage);
		tax1 = tax1.toFixed(2);
		$("#tax_amount"+count).val(tax1);	

		var total=Number(after_discount) + Number(tax1);
		total = total.toFixed(2);
		$("#total"+count).val(total);
	}
	subAmount();
}


function tableDiscountAmount(count = null){
	var tax_percentage = $("#tax_percentage"+count).val();
	var discount_amount = $("#discount_amount"+count).val();
	var sub_total = $("#sub_total"+count).val();
	$("#discount_percentage"+count).val(0);	

    var tax=$("#tax_type").val();

	var discount = (100 * discount_amount) / sub_total;
	discount = discount.toFixed(2);

	$("#discount_percentage"+count).val(discount);	

	var after_discount= Number(sub_total) - Number(discount_amount);

	$("#after_discount"+count).val(after_discount);

	if(tax=="1"){
		var tax1 = (after_discount * Number(tax_percentage)) / (100+ Number(tax_percentage));
		tax1 = tax1.toFixed(2);
		$("#tax_amount"+count).val(tax1);	
				
		var total=Number(after_discount);
		total = total.toFixed(2);
		$("#total"+count).val(total);
	}
	else if(tax=="2"){
		var tax1 = (after_discount/100) * Number(tax_percentage);
		tax1 = tax1.toFixed(2);
		$("#tax_amount"+count).val(tax1);	

		var total=Number(after_discount) + Number(tax1);
		total = total.toFixed(2);
		$("#total"+count).val(total);
	}
	subAmount();
}


function subAmount() {
	var tableProductLength = $("#productTable tbody tr").length;
	var total = 0;
	var number_of_qty = 0;
	var number_of_product = 0;

	for(x = 0; x < tableProductLength; x++) {
		var tr = $("#productTable tbody tr")[x];
		var count = $(tr).attr('id');
		count = count.substring(3);

		total = Number(total) + Number($("#total"+count).val());
		number_of_qty = Number(number_of_qty) + Number($("#qty"+count).val());

		if($("#product_id"+count).val() != ''){
			number_of_product++;
		}
	} 

	$("#number_of_qty").val(number_of_qty.toFixed(2));
	$("#number_of_product").val(number_of_product);
	
	$("#table_total").val(Math.round(total));
	$("#final_total").val(Math.round(total));
	$("#balance").val(Math.round(total));

	if($("#overall_discount_percentage").val()!=""){
		var total = Number($("#table_total").val());
		var percentage = Number($("#overall_discount_percentage").val());

		var discount_amount = (total/100) * percentage;
		discount_amount = discount_amount.toFixed(2);
		$("#overall_discount_amount").val(discount_amount);

		var after_total = total - discount_amount;
		$("#final_total").val(Math.round(after_total));
		$("#balance").val(Math.round(after_total));
	}
	else if($("#overall_discount_amount").val()!=""){
		var total = Number($("#table_total").val());
		var discount_amount = Number($("#overall_discount_amount").val());
		if(total > 0){
			var percentage =(100 * discount_amount) / total;
			percentage = percentage.toFixed(2);
			$("#overall_discount_percentage").val(percentage);
		}
		var after_total = total - discount_amount;
		$("#final_total").val(Math.round(after_total));
		$("#balance").val(Math.round(after_total));
	}

}


$( "#overall_discount_percentage" ).change(function() {
  	var total = Number($("#table_total").val());
	var percentage = Number($("#overall_discount_percentage").val());

	var discount_amount = (total/100) * percentage;
	discount_amount = discount_amount.toFixed(2);
	$("#overall_discount_amount").val(discount_amount);

	var after_total = total - discount_amount;
	$("#final_total").val(Math.round(after_total));
	$("#balance").val(Math.round(after_total));
});

$( "#overall_discount_amount" ).change(function() {
	var total = Number($("#table_total").val());
	var discount_amount = Number($("#overall_discount_amount").val());
	if(total > 0){
		var percentage =(100 * discount_amount) / total;
		percentage = percentage.toFixed(2);
		$("#overall_discount_percentage").val(percentage);
	}
	var after_total = total - discount_amount;
	$("#final_total").val(Math.round(after_total));
	$("#balance").val(Math.round(after_total));
});

function Paid()
{
	var final_total = Number($("#final_total").val());
	var paid=Number($("#paid").val());

	if(final_total >= paid)
	{
	 	var balance=Number(final_total) - Number(paid);
		balance = balance.toFixed(2);
		$("#balance").val(balance);
	}
	 else
	 {
		alert('Given Amount is higher than Sales Amount');
		$("#paid").val('0');
		$("#balance").val(final_total);
		$("#paid").focus();
	 }
}


//Short Cut Keys
document.onkeydown = function (e) {
    e = e || window.event;//Get event
    if (e.ctrlKey) {
        var c = e.which || e.keyCode;//Get key code
        switch (c) {
            case 13://Block Enter Button
            	e.preventDefault();     
                e.stopPropagation();
            case 83://Block Ctrl+S
            	e.preventDefault();     
                e.stopPropagation();
            case 73://Block Ctrl+I --Not work in Chrome
            	e.preventDefault();     
                e.stopPropagation();
            case 68://Block Ctrl+D --Not work in Chrome
            	e.preventDefault();     
                e.stopPropagation();
            case 87://Block Ctrl+W --Not work in Chrome
            	e.preventDefault();     
                e.stopPropagation();
            break;
        }
    }
};

document.onkeyup = function (e) {
	e = e || window.event;//Get event

	if((event.keyCode == 10 || event.keyCode == 83) && event.ctrlKey) {
	  e.preventDefault();
	  Save();
	} 
	else if((event.keyCode == 10 || event.keyCode == 73) && event.ctrlKey) {
	  e.preventDefault();
	  addRow();
	}  	
	else if (e.which == 45) {
	  e.preventDefault();
	  addRow();
 	} 
};

$("#productTabletbody").on('keyup','tr',function(e){
    if (e.which == 46) {
	    e.preventDefault();
	    var row = $(this).attr('value');
	    removeProductRow(row);
    }
    else if((event.keyCode == 10 || event.keyCode == 68) && event.ctrlKey) {
   		e.preventDefault();
	    var row = $(this).attr('value');
	    removeProductRow(row);
  	}     
}); // selected row delete using click delete button