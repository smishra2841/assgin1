<?php
	if(isset($_GET['c'])){
		if (isset($_POST['event'] ))
	 {
	 	

		$sql = "SELECT * FROM event WHERE eventDate='".$month."/".$day."/".$year."'";
		$result = mysqli_query($conn, $sql);
		
		echo "<p>";
		
		while ($events = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			echo "------------------------------------------------------------------------------------"."<br>";
			echo "Title: ".$events['title']."<br>";
			echo "Schedule Date: ".$events['eventDate']."<br>";
			echo "Schedule Time: ".$events['eventTime']."<br>";
			echo "Detail: ".$events['detail']."<br>";
			echo "------------------------------------------------------------------------------------"."<br>";
		}
		echo "</p>";
	}
	}
?>