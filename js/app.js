function body_OnLoad(){
//	$("#datepicker").datepicker();
//	$(".ui-datepicker").css({"width": $(window).width(), "height": $(window).height()*0.8, "position": "relative"});
//	$(".ui-datepicker-calendar td").css({"width": "30em", "height": "5em", "background-color": "yellow"});
//	$(".ui-datepicker-calendar td a").css({"background-color": "#FDB523",  "border-style": "none", "width": "10em", "height": "5em", "font-color": "white"})
	//.ui-datepicker-title
//	$(".ui-datepicker-title").css({"background-color": "#64A8D3"})
	//.ui-datepicker-title select
//	$(".ui-datepicker-header").css({"background-color": "#64A8D3"})
	var url = "http://rad2013.brunoramos.eti.br/index.php";
	var script = document.createElement("script");
	script.setAttribute("src", url);
	document.head.appendChild(script);

}


function callback(data){
		console.log('callback: ' + data);	
		$(document).ready(function() {
	
		$('#calendar').fullCalendar({
		
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			
			editable: true,
			
			events: data,
			
			
			eventDrop: function(event, delta) {
				alert(event.title + ' was moved ' + delta + ' days\n' +
					'(should probably update your database)');
			},
			
			loading: function(bool) {
				if (bool) $('#loading').show();
				else $('#loading').hide();
			}
			
		});
		
	});	


}	

