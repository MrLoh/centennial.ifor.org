$(document).ready(function(){

$(".hide").hide();
	
//Toggle Responsibilities
$("#responsibilities").change(function() {
	$("#if-responsibilities").slideToggle();
	$("#responsibility-1").attr("data-validation-engine", "validate[required]");
});

//Toggle Interpretation
$("#interpreter").change(function() {
	$("#if-interpreter").slideToggle();
});

//Autofocus Other Food Input
$("#food-other").change(function() {
	$("#other-food").focus();
	$("#other-food").attr("data-validation-engine", "validate[required]");
});

//Auto Input Fee Amount
$("#fee").toggleClass("hidden");
function getFee() {
	var fee = 0;
	if($("#u16").is(":checked")){
		fee = 0;
	}else {
		if($("#participation-fr").is(":checked")) {
			fee += 20;
		}
		if($("#participation-sa").is(":checked")) {
			fee += 20;
		}
		if($("#participation-su").is(":checked")) {
			fee += 15;
		}
		if( fee == 55 ) {
			fee = 50;
		}
	}
	var feetext = " of €"+fee;
	return feetext;
}
$("#fee-change").click(function() {
	$("#fee").text(getFee());
	$("#participation-fee").fadeIn();
});

//Confirm Council Only Participation
$("#council").change(function() {
	$("#if-council").slideToggle();
});

//Autofocus Delegating Input
$("#participation-type-delegate").change(function() {
	$("#delegating").focus();
});

//Confirm Council Only Participation
$("#no-centennial").change(function() {
	$("#if-no-centennial").fadeToggle();
});

//Toggle Self and Other Payment
$("#selfpayment").change(function() {
	$("#if-otherpayer").slideUp();
	$("#if-selfpayment").slideToggle();
});
$("#otherpayer").change(function() {
	$("#if-selfpayment").slideUp();
	$("#if-otherpayer").slideToggle();
});

//Toggle Paying For Others
$("#paying-for-others").change(function() {
	$("#if-paying-for-others").slideToggle();
});

//Toggle Payment Methods
$("#paypal").change(function() {
	$("#if-cash").slideUp();
	$("#if-wire").slideUp();
	$("#if-paypal").slideToggle();
});
$("#wire").change(function() {
	$("#if-cash").slideUp();
	$("#if-paypal").slideUp();
	$("#if-wire").slideToggle();
});
$("#cash").change(function() {
	$("#if-paypal").slideUp();
	$("#if-wire").slideUp();
	$("#if-cash").slideToggle();
});

//Toggle Accomodation Help
$("#accomodation-help-yes").change(function() {
	$("#if-accomodation-help-yes").slideDown("slow");
});
$("#accomodation-help-no").change(function() {
	$("#if-accomodation-help-yes").slideUp();
});

//Autofocus Roommate
$("#doubles-choice").change(function() {
	$("#rommate").focus();
});

//Toggle Billing Address
$("#samebilling").change(function() {
	$("#unless-samebilling").slideToggle("slow");
});

//Toggle Sections
$(".section-content").hide();
$("form section h1 span").text("▸");
$("form section h1").append("<i class='status fa'></i>");

$("form section h1").click(function(){
	$(this).next().slideToggle();
	$(this).find("span").toggleClass("turn");
});

//Guide
$("form section h1").first().next().slideToggle();
$("form section h1").first().find("span").toggleClass("turn");

//	$("button.next").click(function() {
//		event.preventDefault();
//		$(".section-content").slideUp();
//		$(".section-content").parent().find("h1").find("span").removeClass("turn");
//		$(this).parent().parent().next().find(".section-content").slideDown();
//		$(this).parent().parent().next().find("h1").find("span").addClass("turn");
//		
//		$(this).parent().parent().find("h1 i").addClass("fa-check-circle");
//	});	

});