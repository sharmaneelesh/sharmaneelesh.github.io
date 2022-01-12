$("#button").click(function() {
	$("#mainbody").hide();
	$("#about-mainbody").hide();
	$("#secretariat-mainbody").hide();
	$("#navigation").show();
	$("#navigationcontents").show();
});

$("#clickme").click(function() {
	$("#mainbody").show();
	$("#about-mainbody").show();
	$("#secretariat-mainbody").show();
	$("#navigation").hide();
	$("#navigationcontents").hide();
});

function myFunction(x) {
  if (x.matches) {
    var elementheight =  $("#secretariat-NeeleshSharma").height();
	$(".secretariat-SecMemberImage").css("marginTop", (elementheight-200)/2);

	var elementheight =  $("#secretariat-SakshamSharma").height();
	$(".secretariat-SecMemberImage").css("marginTop", (elementheight-200)/2);

	var elementheight =  $("#secretariat-HardikKharbanda").height();
	$(".secretariat-SecMemberImage").css("marginTop", (elementheight-200)/2);

	var elementheight =  $("#secretariat-RishiGusain").height();
	$(".secretariat-SecMemberImage").css("marginTop", (elementheight-200)/2);

	var elementheight =  $("#secretariat-ShivamAnand").height();
	$(".secretariat-SecMemberImage").css("marginTop", (elementheight-200)/2);

	var elementheight =  $("#secretariat-ChanchalSrivastava").height();
	$(".secretariat-SecMemberImage").css("marginTop", (elementheight-200)/2);

	var elementheight =  $("#secretariat-ShikharSuman").height();
	$(".secretariat-SecMemberImage").css("marginTop", (elementheight-200)/2);

	var elementheight =  $("#secretariat-AryanSharma").height();
	$(".secretariat-SecMemberImage").css("marginTop", (elementheight-200)/2);
  } ;
};

var x = window.matchMedia("(min-width: 575.98px)");
myFunction(x);
x.addListener(myFunction);
