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
function validateSectionNext(fields, that) {
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
	
	//Section Personal
	var secPersonal = ["#first-name","#last-name","#birthday","#address","#city","#post-code","#state","#country","#email"];
	$("#sec-personal .next").click(function() {
		validateSectionNext(secPersonal, this);
	});
	$("#sec-personal h1").click(function() {
		validateSection(secPersonal, this);
	});
	
	//Section Orga
	var secOrga = ["#responsibility-1"];
	$("#sec-orga .next").click(function() {
		validateSectionNext(secOrga, this);
	});
	$("#sec-orga h1").click(function() {
		validateSection(secOrga, this);
	});
	
	//Section Lang
	var secLang = ["#from-lang-de", "#to-lang-de"];
	$("#sec-lang .next").click(function() {
		validateSectionNext(secLang, this);
	});
	$("#sec-lang h1").click(function() {
		validateSection(secLang, this);
	});
	
	$(".formErrorContent").click(hide());
});