function body_OnLoad(){
	$("#datepicker").datepicker();
	$(".ui-datepicker").css({"width": "70em", "height": "30em", "position": "relative", "left": "5%"});
//	$(".ui-datepicker-calendar td").css({"width": "30em", "height": "5em", "background-color": "yellow"});
	$(".ui-datepicker-calendar td a").css({"background-color": "gray",  "border-style": "none", "width": "10em", "height": "5em", "font-color": "white"})
}
