$(document).ready(function() {
	// alert("ready");
	$("#about article.believes").hide();
	$("#about article.history").hide();

	$(".tabs h2.centennial").click(function() {
		$(".tabs h2").removeClass("top");
		$(this).addClass("top");
		$("#about article").hide();
		$("#about article.centennial").show();
	})

	$(".tabs h2.believes").click(function() {
		$(".tabs h2").removeClass("top");
		$(this).addClass("top");
		$("#about article").hide();
		$("#about article.believes").show();
	})

	$(".tabs h2.history").click(function() {
		$(".tabs h2").removeClass("top");
		$(this).addClass("top");
		$("#about article").hide();
		$("#about article.history").show();
	})

	$("#endorser div.adolfo").hide();
	$("#endorser div.hildegard").hide();
	$("#endorser div.sulak").hide();

	$("#endorser img.mairead").click( function() {
		$("#endorser div").hide();
		$("#endorser div.mairead").show();
	});
	$("#endorser img.adolfo").click( function() {
		$("#endorser div").hide();
		$("#endorser div.adolfo").show();
	});
	$("#endorser img.hildegard").click( function() {
		$("#endorser div").hide();
		$("#endorser div.hildegard").show();
	});
	$("#endorser img.sulak").click( function() {
		$("#endorser div").hide();
		$("#endorser div.sulak").show();
	});
});
