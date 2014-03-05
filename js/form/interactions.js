$(document).ready(function(){
	
	$(".hide").hide();
		
	//Toggle Responsibilities
	$("#responsibilities").change(function() {
		$("#if-responsibilities").slideToggle();
		$("#responsibility-1").toggleClass("validate[required]");
	});
	
	//Toggle Interpretation
	$("#interpreter").change(function() {
		$("#if-interpreter").slideToggle();
	});
	
	//Autofocus Other Food Input
	$("#food-other").change(function() {
		$("#other-food").focus();
		$("#other-food").addClass("validate[required]");
	});
	$("#food-omnivore").change(function() {
		$("#other-food").removeClass("validate[required]");
		$("#other-food").validationEngine("hide");
	});
	$("#food-vegetarian").change(function() {
		$("#other-food").removeClass("validate[required]");
		$("#other-food").validationEngine("hide");
	});
	$("#food-vegan").change(function() {
		$("#other-food").removeClass("validate[required]");
		$("#other-food").validationEngine("hide");
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

	$("#u16").change(function() {
		$("#payment-amount").toggleClass("validate[required,custom[number]]");
		$("#selfpayment").toggleClass("validate[required] radio");
		$("#otherpayer").toggleClass("validate[required] radio");
	});
	
	//Toggle Council
	$("#council").change(function() {
		$("#if-council").slideToggle();
		$("#participation-type-delegate").toggleClass("validate[required] radio");
		$("#participation-type-guest").toggleClass("validate[required] radio");
		$("#council-pay-self").toggleClass("validate[required] radio");
		$("#council-pay-IFOR").toggleClass("validate[required] radio");
	});
	
	//Autofocus Delegating Input
	$("#participation-type-delegate").change(function() {
		$("#delegating").focus();
		$("#delegating").addClass("validate[required]");
		var orga = $("#organization").val();
		$("#delegating").val(orga);
	});
	$("#participation-type-guest").change(function() {
		$("#delegating").removeClass("validate[required]");
		$("#delegating").validationEngine("hide");
	});
	
	//Confirm Council Only Participation
	$("#no-centennial").change(function() {
		$("#if-no-centennial").fadeToggle();
	});
	
	//Toggle Self and Other Payment
	$("#selfpayment").change(function() {
		$("#if-otherpayer").slideUp();
		$("#if-selfpayment").slideToggle();
		$("#payer").removeClass("validate[required]");
		$("#paypal").addClass("validate[required] radio");
		$("#wire").addClass("validate[required] radio");
		$("#cash").addClass("validate[required] radio");
	});
	$("#otherpayer").change(function() {
		$("#if-selfpayment").slideUp();
		$("#if-otherpayer").slideToggle();
		$("#paying-person").addClass("validate[required]");
		$("#paypal").removeClass("validate[required] radio");
		$("#wire").removeClass("validate[required] radio");
		$("#cash").removeClass("validate[required] radio");
	});
	
	//Toggle Paying For Others
	$("#paying-for-others").change(function() {
		$("#if-paying-for-others").slideToggle();
		$("#paying-for-1").toggleClass("validate[required]");
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
	$("#accommodation-help-yes").change(function() {
		$("#if-accommodation-help-yes").slideDown("slow");
		if($("#council").is(":checked")) {
			$("#unless-council").hide();;
		}
		$("#budget-15").addClass("validate[required] radio");
		$("#budget-30").addClass("validate[required] radio");
		$("#budget-40").addClass("validate[required] radio");
		$("#budget-90").addClass("validate[required] radio");
		$("#doubles-choice").addClass("validate[required] radio");
		$("#doubles-IFOR").addClass("validate[required] radio");
		$("#doubles-single").addClass("validate[required] radio");
		$("#payer-orga").addClass("validate[required] radio");
		$("#payer-self").addClass("validate[required] radio");
		$("#billing-name").addClass("validate[required]");
		$("#billing-address").addClass("validate[required]");
		$("#billing-city").addClass("validate[required]");
		$("#billing-post-code").addClass("validate[required,custom[number]");
		$("#billing-state").addClass("validate[required]");
		$("#billing-country").addClass("validate[required]");

	});
	$("#accommodation-help-no").change(function() {
		$("#if-accommodation-help-yes").slideUp();
		$("#budget-15").removeClass("validate[required] radio");
		$("#budget-30").removeClass("validate[required] radio");
		$("#budget-40").removeClass("validate[required] radio");
		$("#budget-90").removeClass("validate[required] radio");
		$("#doubles-choice").removeClass("validate[required] radio");
		$("#doubles-IFOR").removeClass("validate[required] radio");
		$("#doubles-single").removeClass("validate[required] radio");
		$("#payer-orga").removeClass("validate[required] radio");
		$("#payer-self").removeClass("validate[required] radio");
		$("#billing-name").removeClass("validate[required]");
		$("#billing-address").removeClass("validate[required]");
		$("#billing-city").removeClass("validate[required]");
		$("#billing-post-code").removeClass("validate[required,custom[number]");
		$("#billing-state").removeClass("validate[required]");
		$("#billing-country").removeClass("validate[required]");
	});
	
	//Autofocus Roommate
	$("#doubles-choice").change(function() {
		$("#roommate").focus();
		$("#roommate").addClass("validate[required]");
	});
	$("#doubles-single").change(function(){
		$("#roommate").removeClass("validate[required]");
		$("#roommate").validationEngine("hide");
	});
	$("#doubles-IFOR").change(function(){
		$("#roommate").removeClass("validate[required]");
		$("#roommate").validationEngine("hide");
	});
	
	//Toggle Same as Above
	$("#payer-self").change(function() {
		$("#if-payer-self").slideDown();
		
	});
	$("#payer-orga").change(function() {
		$("#if-payer-self").slideUp();
		$("#unless-samebilling").slideDown();
		var orga = $("#organization").val();
		if($("#delegating").val() != "") {
			orga = $("#delegating").val();
		}
		$("#billing-name").val(orga);
		$("#billing-name").focus();
	});
	
	
	//Toggle Billing Address
	$("#samebilling").change(function() {
		$("#unless-samebilling").slideToggle();
		$("#billing-name").toggleClass("validate[required]");
		$("#billing-address").toggleClass("validate[required]");
		$("#billing-city").toggleClass("validate[required]");
		$("#billing-post-code").toggleClass("validate[required,custom[number]");
		$("#billing-state").toggleClass("validate[required]");
		$("#billing-country").toggleClass("validate[required]");
	});

	$("#invitation").change(function() {
		$("#if-invitation").slideToggle();
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
});