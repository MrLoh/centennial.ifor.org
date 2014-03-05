function validate(fields) {
	var valid = true;
	for(var i = 0; i < fields.length; i++) {
		field = fields[i];
		test = !$(field).validationEngine("validate");
		valid = valid && test;
	}
	return valid;
}

function validateSection(fields, that) {
	var valid = validate(fields);
	setTimeout(function(){
		if(!$(that).next().is(":visible")){
			if(valid) {
				$(that).find("i").addClass("fa-check-circle");
				$(that).find("i").removeClass("fa-exclamation-triangle");
			} else {
				$(that).find("i").addClass("fa-check-circle");
				$(that).find("i").addClass("fa-exclamation-triangle");
			}
		}
	}, 500);
	return true;
}
function validateSectionNext(fields, that, event) {
	event.preventDefault();
	var valid = validate(fields);
		if(valid) {
			$(".section-content").slideUp();
			$(".section-content").parent().find("h1").find("span").removeClass("turn");
			$(that).parent().parent().next().find(".section-content").slideDown();
			$(that).parent().parent().next().find("h1").find("span").addClass("turn");
			$(that).parent().parent().find("h1 i").addClass("fa-check-circle");
			$(that).parent().parent().find("h1 i").removeClass("fa-exclamation-triangle");
		} else {
			$(that).parent().parent().find("h1 i").addClass("fa-check-circle");
			$(that).parent().parent().find("h1 i").addClass("fa-exclamation-triangle");
		}
	return true;
}


$(document).ready(function(){
	
	$("#form").validationEngine();
	$("#submit").click(function() {
		$(".section-content").slideDown();
	});

	//Section Personal
	var secPersonal = ["#first-name","#last-name","#birthday","#address","#city","#post-code","#state","#country","#email"];
	$("#sec-personal .next").click(function(event) {
		validateSectionNext(secPersonal, this, event);
	});
	$("#sec-personal h1").click(function() {
		validateSection(secPersonal, this);
	});
	
	//Section Orga
	var secOrga = ["#responsibility-1"];
	$("#sec-orga .next").click(function(event) {
		validateSectionNext(secOrga, this, event);
	});
	$("#sec-orga h1").click(function() {
		validateSection(secOrga, this);
	});
	
	//Section Lang
	$("#sec-lang .next").click(function(event) {
		validateSectionNext([], this, event);
	});
	$("#sec-lang h1").click(function(event) {
		validateSection([], this, event);
	});
	
	//Section Meals
	var secMeals = ["#food-omnivore","#food-vegetarian","#food-vegan","#food-other","#other-food"];
	$("#sec-meals .next").click(function(event) {
		validateSectionNext(secMeals, this, event);
	});
	$("#sec-meals h1").click(function() {
		validateSection(secMeals, this);
	});
	
	//Section Programme
	$("#sec-programme .next").click(function(event) {
		validateSectionNext([], this, event);
	});
	$("#sec-programme h1").click(function() {
		validateSection([], this);
	});
	
	//Section Fee
	var secFee = ["#participation-type-delegate","#participation-type-guest", "#council-pay-self","#council-pay-IFOR","#delegating","#selfpayment","#otherpayer","#paying-for-1","#paying-person","#payment-amount","#paypal","#wire","#cash"];
	$("#sec-fee .next").click(function(event) {
		validateSectionNext(secFee, this, event);
	});
	$("#sec-fee h1").click(function() {
		validateSection(secFee, this);
	});
	
	//Section Rooms
	var secRooms = ["#accommodation-help-yes","#accommodation-help-no","#budget-15","#budget-30","#budget-40","#budget-90","#doubles-choice","#doubles-IFOR","#doubles-single","#payer-orga","#payer-self","#roommate","#billing-name","#billing-address","#billing-city","#billing-post-code","#billing-state","#billing-country"];
	$("#sec-rooms .next").click(function(event) {
		validateSectionNext(secRooms, this, event);
	});
	$("#sec-rooms h1").click(function() {
		validateSection(secRooms, this);
	});
	
	//Section Arrive
	var secArrive = ["#arrival","#departure"];
	$("#sec-arrive .next").click(function(event) {
		validateSectionNext(secArrive, this, event);
	});
	$("#sec-arrive h1").click(function() {
		validateSection(secArrive, this);
	});
	
	$(".formErrorContent").click(hide());
});