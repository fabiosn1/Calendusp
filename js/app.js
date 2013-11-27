function body_OnLoad(){
	$("#datepicker").datepicker();
	$(".ui-datepicker").css({"width": $(window).width(), "height": $(window).height()*0.8, "position": "relative"});
//	$(".ui-datepicker-calendar td").css({"width": "30em", "height": "5em", "background-color": "yellow"});
	$(".ui-datepicker-calendar td a").css({"background-color": "#FDB523",  "border-style": "none", "width": "10em", "height": "5em", "font-color": "white"})
	//.ui-datepicker-title
	$(".ui-datepicker-title").css({"background-color": "#64A8D3"})
	//.ui-datepicker-title select
	$(".ui-datepicker-header").css({"background-color": "#64A8D3"})
	getData();
}

function getData(){
	    console.log('getData');
        var url = "zon.allalla.com";
        var script = document.createElement("script");
        script.setAttribute("src", url);
        document.head.appendChild(script);
        console.log('endGetData');
}

function callback(data){
	var holidays = JSON.parse(data);
	console.log('callback');
	console.log(data);
	
}
