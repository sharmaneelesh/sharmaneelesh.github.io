//Scrolling effect
var vh = jQuery(window).height();

var scrollTo = vh;
	
var hey = 0;
	
$(window).on("scroll", function() {
	
	var yPos = $(this).scrollTop(),
		yPer = (yPos / scrollTo);
		
	if (yPer > 1) {
		yPer = 1;
	}
	
/*	var logoPos = ( -1*(yPer*48)+50),
		logoSize = (logoHeight-((logoHeight-finalSize)*yPer));
		
	logo.css({
		top: logoPos + "%",
		left: logoPos + "%",
		transform: "translate(-" + logoPos + "%, -" + logoPos + "%)",
		height: logoSize
	});*/

	if(hey==0){
	if(yPer==1) {
		$("#welcomehex").show();
		$("#welcometext").show();
		$("#div1").hide();
		document.body.scrollTop = 0; // For Safari
		document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
		hey=1;
	}}
	
});

//Chevron positioning

var hexheight = $("#welcomehex").height();
var finalheight = hexheight/2;
$("#welcomechevron").css("margin-top", finalheight + "px");