$(document).ready(function(){

	$("#menu li, .container").addClass("shadow round");
	$("li a").addClass("round");
	// $("h1").css("textAlign","center");
	// $("nav").css("height","0px");
	// $("nav").animate({
	// 	height: '400px'
	// }, 1500);
	$(".single_view").addClass("shadow round")
	// $(".container").css("display","none");
	// $(".container").fadeIn("slow");

	// Toggle example
	$("#square").toggle(function() {
		$(this).animate( {height: '300px', width: '400px', fontSize: '12'}, 'slow');
	},function(){
		$(this).animate( {height: '300px', width: '97%', fontSize: '32px' }, 'slow');
	});

	$("#query").focus();
	$("#title").focus();


});
