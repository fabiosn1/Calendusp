<!DOCTYPE>


<html>
    <head>  
    
        <!-- include jquery mobile -->
        <link rel="stylesheet" href="css/jquery.mobile-1.3.2.min.css" />
	    <script src="js/jquery-1.9.1.min.js"></script>
	    <script src="js/jquery.mobile-1.3.2.min.js"></script>     
       
    	<!-- include jquery -->
    	<link rel="stylesheet" href="css/jquery.mobile.structure-1.3.2.min.css" />
    	<script src="js/jquery-1.9.1.min.js"></script>
    	<script src="js/jquery.mobile-1.3.2.min.js"></script>
    	
 		<!-- include jquery ui -->
    	<link rel="stylesheet" href="css/jquery-ui.css" />
  		<script src="js/jquery-1.9.1.min.js"></script>
  		<script src="js/jquery-ui.js"></script>
  		
  		<script src="js/app.js"> </script>
	</head>  		
	<body>
		<?php 

		    $info = array();
		    $monthNumbers = array();
		    $day = array();
		    $name = array();	
		    $month = array();			
						    
		    # array containing months of the year
		    $months = array(
				"blank",
				"janeiro",
				"fevereiro",
				"março",
				"abril",
				"maio",
				"junho",
				"julho",
				"agosto",
				"setembro",
				"outubro",
				"novembro",
				"dezembro",
			);
		    
		    # creates and loads simple html dom parser

		    include('simple_html_dom.php');
			
			
			$html = file_get_html('https://uspdigital.usp.br/jupiterweb/jupCalendario2014.jsp');
			
			$tdelements = $html->find('td'); 

			$i = 4;			
			$j = 0;
			$k = 0;
			while($i < 39){
				if(($monthNumber = isMonth($tdelements[$i]->plaintext)) != 0){
					$info[$j]= $i;
					$monthNumbers[$j] = $monthNumber;
					$j++;
				}

				$i++;				
			}			
			
			$info[$j] = $info[$j-1]+4;
				
			for($i = 0; $i < count($info); $i++){
				$j = $info[$i]+1;
				while($j < $info[$i+1]){
					$day[$k] = $tdelements[$j]->plaintext.'.'.$monthNumbers[$i];
					$name[$k] = $tdelements[++$j]->plaintext;						 
					$j++;
					$k++;
				}
				
			
			}

			$output = array_combine($day, $name);
                        
			echo 'callback('.json_encode($output).')';

			function isMonth($value){
					
				# puts $value to lower case and checks whether it's a month
				global $months;
				
		                $value = strtolower($value);
				for($j = 0; $j < count($months) && strlen($value) != 0; $j++){
					if(strpos($value, $months[$j]) !== FALSE){
						return $j;
					}
				}
				return 0;
			} 
			
		?>
		<div id="headerDiv" data-role="header">
    	  <h2> Calendusp </h2>
    	</div>
    	<div id="datepicker">
    	</div>    	
	</body>
</html>
