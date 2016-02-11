
<?php
if(isset($_GET['add'])&& !empty($_POST['txttitle'])&& !empty($_POST['txtdetail'])){
	
	$title =$_POST['txttitle'];
	$detail =$_POST['txtdetail'];
	$eventdate = $month."/".$day."/".$year;
	$eventtime =$_POST['usr_time'];
	$userid = $_SESSION['userid'];
	$sql = "INSERT into event(title,detail,eventDate,eventEnd,eventTime,user_id) values ('".$title."','".$detail."','".$eventdate."',now(),'".$eventtime."','".$userid."')";
	if ($conn->query($sql) === TRUE) {
		echo "<br/><center>New record created successfully</center><br/>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}$conn->close();

}
else if(isset($_GET['add'])&& empty($_POST['txttitle'])&& empty($_POST['txtdetail']) && isset($_POST['btnadd'] ))
	{echo "<br/><center>Please enter Title and detail for the schedule<center><br/>";}

?>



