


<?php
		ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	 	echo "<tr>";

		$first_day = mktime(0,0,0,$month, 1, $year) ;
		echo "$first_day";
		$name_of_day = date('w', $first_day) ; //get the day of the weeek
		//caluting blank days for the month for diaplay 
		echo "<br/>$name_of_day";
		switch($name_of_day){   
			case "0": $blank = 0; 
			break;   
			case "1": $blank = 1; 
			break;   
			case "2": $blank = 2; 
			break;   
			case "3": $blank = 3; 
			break;   
			case "4": $blank = 4; 
			break;   
			case "5": $blank = 5; 
			break;   
			case "6": $blank = 6; 
			break;   
		}

		$total_days = cal_days_in_month(CAL_GREGORIAN, $month, $year) ;  
		$day_count = 1; 
		echo "printing dates2";
		while ( $blank > 0 )   { 
		echo "printing dates3";  
			echo "<td class= 'a'></td>";   
			$blank = $blank-1;   
			$day_count++;  
		}
		$day_num = 1;
		while ( $day_num <= $total_days )   
		{  
			$todaysDate = date("n/j/Y");
			$dateToCompare = $month. '/' . $day_num. '/' . $year;
			echo "<td align='center' ";
 			
			//this is where i am comparing two dates but it is giving error
			//every day of the current month is turnin green
			if ($todaysDate == $dateToCompare)
			{
				
				echo "class ='a today'";

			}  
			else
			{
				$sql = "SELECT * FROM event WHERE eventDate='".$dateToCompare."'";
				$stmt =mysqli_prepare($conn, $sql);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);

				$noOfEvent =  mysqli_stmt_num_rows($stmt);
				 printf("Result set has %d rows.\n", $noOfEvent );
				if($noOfEvent >= 1)
				{
					echo "class='a event'";
				}
				mysqli_stmt_close($stmt);
				
			}
			echo "> <a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day_num."&year=".$year."&v=true'>".$day_num."</a>";
			$sql = "SELECT * FROM event WHERE eventDate='".$dateToCompare."'";
			$stmt =mysqli_prepare($conn, $sql);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$nEvent =  mysqli_stmt_num_rows($stmt);
			if($nEvent >0)
				{
					echo "<br/><form method='post'><input type='submit' name='event' value='Detail' width ='10px' formmethod='post' formaction='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day_num."&year=".$year."&c=true'> </form>";
				}
			else {echo "<br/>";}
			echo " </td>";
			$day_num++;   
			$day_count++;    
			//Make sure we start a new row every week  
			if ($day_count > 7)  
			{  
				echo "</tr><tr>";
				echo "completed printing dates";  
				$day_count = 1;  
			}  
			
		}
		while ( $day_count >1 && $day_count <=7 )   
			{   
				echo "<td> </td>";   
				$day_count++;   
			}  


		echo "</tr>";

?>
