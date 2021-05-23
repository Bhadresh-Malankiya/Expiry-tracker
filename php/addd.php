
<?php
error_reporting (E_ALL ^ E_NOTICE);
	session_start();
	if(!$_SESSION["username"])
	{
		header('location:../index.html');
	}
	else{
	$username=$_SESSION["username"];
	$dname=$_POST["name"];
 	$dcategory=$_POST["category"];
    $idate=$_POST["idate"];
    $dedate=$_POST["dedate"];
    $drdate0=$_POST["drdate0"];
	$drdate1=$_POST["drdate1"];	
	$drdate2=$_POST["drdate2"];
	$drdate3=$_POST["drdate3"];
	$drdate4=$_POST["drdate4"];	
	$ddesc=$_POST["ddescription"];

	$insertquery="INSERT INTO `documents`(`username`, `dname`, `dcategory`, `idate`, `dedate`, `drdate0`,`drdate1`,`drdate2`,`drdate3` , `drdate4` , `ddesc`) VALUES ('$username','$dname','$dcategory','$idate','$dedate','$drdate0','$drdate1','$drdate2','$drdate3','$drdate4','$ddesc')";

	$con = mysqli_connect("localhost","root","","demo");
	if(!$con)
	{
		die("Connot connet to Database :" . mysqli_connect_errno());
	}
	else
	{	
		if(!mysqli_query($con,$insertquery))
		{
			echo "<b> Server is down try after sometimes... Mr.</b>".$_SESSION["username"];
		}
		else
		{
			include("loader.php");
			header('refresh: 3; url= ../view/vreminderdate.php');
		}
		mysqli_close($con);
	}
	}
?>