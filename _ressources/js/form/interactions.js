$(document).ready(function(){
	$(".hide").hide();
	
	$("#responsibilities").change(function() {
		$("#if-responsibilities").slideToggle();
	});
	
	$("#interpreter").change(function() {
		$("#if-interpreter").slideToggle();
	});
	
	//Autofocus Other Food Input
	$("#food-other").change(function() {
		$("#other-food").focus();
	});
	
	//Auto Input Fee Amount
	var fee = $("#fee").data("fee");
	$("#fee").text(fee);
	
	$("#participation-fee").change(function() {
		$("#fee").text("50");
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
	$("#accomodation-help").change(function() {
		$("#if-accomodation-help").slideToggle("slow");
	});
	
	//Autofocus Roommate
	$("#doubles-choice").change(function() {
		$("#rommate").focus();
	});
	
	//Toggle Billing Address
	$("#samebilling").change(function() {
		$("#unless-samebilling").slideToggle("slow");
	});
	
});