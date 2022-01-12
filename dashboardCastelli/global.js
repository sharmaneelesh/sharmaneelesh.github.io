$("#arrow1").click(function(){
	$("#arrow1").hide();
	$("#arrow2").show();
	$("#reportsData").show();
});

$("#arrow2").click(function(){
	$("#arrow2").hide();
	$("#arrow1").show();
	$("#reportsData").hide();
});

$("#arrow3").click(function(){
	$("#arrow3").hide();
	$("#arrow4").show();
});

$("#arrow4").click(function(){
	$("#arrow4").hide();
	$("#arrow3").show();
});

$("#arrow5").click(function(){
	$("#arrow5").hide();
	$("#arrow6").show();
});

$("#arrow6").click(function(){
	$("#arrow6").hide();
	$("#arrow5").show();
});

$("#arrow7").click(function(){
	$("#arrow7").hide();
	$("#arrow8").show();
});

$("#arrow8").click(function(){
	$("#arrow8").hide();
	$("#arrow7").show();
});

$("#arrow9").click(function(){
	$("#arrow9").hide();
	$("#arrow10").show();
});

$("#arrow10").click(function(){
	$("#arrow10").hide();
	$("#arrow9").show();
});

$("#arrow11").click(function(){
	$("#arrow11").hide();
	$("#arrow12").show();
});

$("#arrow12").click(function(){
	$("#arrow12").hide();
	$("#arrow11").show();
});

$(".box").click(function() {
	alert("show report");
})

$("#search").click(function() {
	var temp = $("#searchBox").val();
	alert("search result for "+temp);
})

$("#mail").click(function() {
	alert("no new messages!");
})

$("#bell").click(function() {
	alert("no new notifications");
})


