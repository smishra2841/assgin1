
<?php
	if(isset($_GET['add'])&& !empty($_POST['txttitle'])&& !empty($_POST['txtdetail'])){
		
		$title =$_POST['txttitle'];
		$detail =$_POST['txtdetail'];
		$eventdate = $month."/".$day."/".$year;
		$eventtime =$_POST['usr_time'];
		
		$sql = "INSERT into event(title,detail,eventDate,eventEnd,eventTime) values ('".$title."','".$detail."','".$eventdate."',now(),'".$eventtime."')";
		if ($conn->query($sql) === TRUE) {
			echo "<br/>New record created successfully<br/>";
			} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			}$conn->close();

	}
	else if(isset($_GET['add'])&& empty($_POST['txttitle'])&& empty($_POST['txtdetail']) && isset($_POST['btnadd'] ))
		{echo "<br/>Please enter Title and detail for the schedule<br/>";}

	?>



