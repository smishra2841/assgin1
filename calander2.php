<?php session_start(); 
if($_SESSION['userid']=="" && $_SESSION['name']==""){
	header("location: index.php");}
?>
<?php include 'dbconnect.php' ?>
<html>



<head>Event Calander</head>

<body>


<h4>

<?php echo "Welcome " . $_SESSION["name"] . ".<br>"; ?>
</h4>

<script>
		function goLastMonth(month, year){
			if(month == 1) {
				--year;
				month = 13;
			}
			document.location.href ="<?php $_SERVER['PHP_SELF'];?>?month="+(month-1)+"&year="+year;
			
		}
		function goNextMonth(month, year){
			if(month == 12) {
				++year;
				month = 0;
			}
			document.location.href ="<?php $_SERVER['PHP_SELF'];?>?month="+(month+1)+"&year="+year;
			
		}
</script>
<style>
		.today{
			background-color: #00ff00;
		}
		.event{
			background-color: #FF8080;
		}
		a {
     		text-decoration: none ;
     		color:black;
		  }
		a:hover{
    		color:red;
    		text-decoration:none;
    		cursor:pointer;
   			}
   		.t1 {width:25%;height:50%;}
		.a  { width: 20px;height:65px;}
</style>


<?php include 'tableheader.php' ?>
<?php include 'addingData.php' ?>
<?php include 'dbconnect.php' ?>


<table class= 't1' border='1' >

<tr>

	<td  class= 'a' colspan='7' align="center">
	<input  type='button' value='<'name='previousbutton' onclick ="goLastMonth(<?php echo $month.",".$year?>)">&nbsp;&nbsp;<?php echo $monthName.", ".$year; ?>&nbsp;&nbsp;<input type='button' value='>'name='nextbutton' onclick ="goNextMonth(<?php echo $month.",".$year?>)"></td>
</tr>

<tr>
	<td class= 'a'>Sunday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td class= 'a'>Monday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td class= 'a'>Tuesday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td class= 'a'>wednesday&nbsp;&nbsp;&nbsp;</td>
	<td class= 'a'>Thuesday&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td class= 'a'>Friday&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td class= 'a'>Saturday&nbsp;&nbsp;&nbsp;&nbsp;</td>
</tr>
	<?php include 'tablerow.php' ?>

</table>


<?php include 'schedule.php' ?>
<?php include 'bttnDetail.php' ?>
 Click here to <a href = "logout.php" tite = "Logout"><u>logout</u>.
</body>
</html>