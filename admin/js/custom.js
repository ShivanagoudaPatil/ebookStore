

//Scan - Add page js 
$('input[type=radio][name=actionRadio]').change(function() {
        if (this.value == 'in') {
            $(".actionIn").show();
            $(".actionMove").hide();
        }else if (this.value == 'out') {
            $(".actionIn").hide();
            $(".actionMove").hide();
        }else if (this.value == 'move'){
			$(".actionIn").hide();
            $(".actionMove").show();
        }
    });

$("#unit-type").change(function() {
        if (this.value == 'box') {
            $(".boxqty").show();
        }else {
            $(".boxqty").hide();
        }
    });


$("#itemcode").keyup(function() {
   var  $itemcode = $("#itemcode"),
   		 $itemName = $(".itemData");
   		
		   if($itemcode.val().length == 8){
   	 
			   	 var data = $itemcode.val();
			   	 $.ajax({
				      url: '/ka_app/ajaxUtil.php',
				      type: 'POST',
				      data: "itemcode="+ data,
				      success: function(data) {
				        $("#itemData").html(data);
				      }
			   	});
   			}	
});

