validate = (field) ->
	$(field).validationEngine("validate")
	
valid = (fields) ->
	unvalid = true
	for field in fields
		unvalid == unvalid || validate(field)


$("#form").validationEngine("attach");

$("button#val-1").click(function() {
	event.preventDefault();
	var unvalid = validate("#first-name");
	unvalid = unvalid || validate("#last-name");
//		alert(unvalid);
	if(!unvalid) {
		$(".section-content").slideUp();
		$(".section-content").parent().find("h1").find("span").removeClass("turn");
		$(this).parent().parent().next().find(".section-content").slideDown();
		$(this).parent().parent().next().find("h1").find("span").addClass("turn");
		$(this).parent().parent().find("h1 i").addClass("fa-check-circle");
		$(this).parent().parent().find("h1 i").removeClass("fa-exclamation-triangle");
	} else {
		$(this).parent().parent().find("h1 i").addClass("fa-check-circle");
		$(this).parent().parent().find("h1 i").addClass("fa-exclamation-triangle");
	};
});