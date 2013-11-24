<!DOCTYPE html>

<html>
    <head> </head>
	<body>
		<?php 

		    $info = array(
			   array(),
			   array(),
			   array(),
			   array(),
			   array(),
			   array(),
			   array(),
			   array(),
			   array(),
			   array(),
			   array(),
			   array()
			);
		
					    
		    # array containing months of the year
		    $months = array(
				"janeiro",
				"fevereiro",
				"março",
				"abril",
			    "maio",
				"junho",
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
			
			

			for($i = 0; $i < 97	; $i++){
				    $j = 0;
				    while(($monthNumber = isMonth($tdelements[$i]->plaintext)) == -1){
				        $info[$monthNumber][$j] = $tdelements[$i]->plaintext;
						$i++;
						$j++;
					}	
			}
			
			
			for($i = 0; $i < 12; $i++){
				echo $months[$i].': <br>';
				for($j = 0; $j < count($info[$i]); $j++){
						echo $info[$j].'<br>';
				}
				echo '<br><br>';
			}
						
			function isMonth($value){
					
				# puts $value to lower case and checks whether it's a month
				global $months;
				
			    $value = strtolower($value);

				for($j = 0; $j < count($months) && strlen($value) != 0; $j++){
					
					if(strpos($value, $months[$j]) !== FALSE){
						
				        return $j;
					}
				}
				return -1;
			} 
		    echo 'Henry viadinho! o||o';
			
		?>
	</body>
</html>